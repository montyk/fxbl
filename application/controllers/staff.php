<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $userDetails=unserialize($this->session->userdata('user_details'));
        // echo '<pre>'; print_r($userDetails); echo '</pre>';
        if(empty($userDetails)){
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('staff/index');
    }

    public function profile()
    {
        $user_details = unserialize($this->session->userdata['user_details']);
        $data=new stdclass();
        $id = $user_details->id;
        if($id)
        {
            $user_info=$this->users_model->user_details($id);
            if($user_info) {
                $data=$user_info[0];
            }
            $data->id=$id;
        }
        else
        {
            $tbl_array = array('users','users_address','users_contacts','users_settings');
            $data = $this->users_model->gettabledetails($tbl_array);
            $data->ecur_details[0] = $this->users_model->gettabledetails(array('users_ecurrencies'));
            $data->id = 0;
        }
        $data->master_data = $this->users_model->getMasterData();
        /*echo date('m-d-Y h:i:s',strtotime($data->last_modified)+(-($this->session->userdata('ctz_offset')*60)));
        echo '<pre>';
        print_r($data);die;*/
        $data->session_id = MD5($this->session->userdata('session_id'));
        $data->myprofile = 1;
        $data->ecurrencies_json = json_encode($this->users_model->getEcurrencies());
        // echo '<pre>'; print_r($data); echo '</pre>'; die;
        $this->load->view('staff/userprofile',$data);
    }

    


    /*
     * Buy Functions Start here
     *
     */

    public function buy()
    {
        $post=$this->input->post();
        $this->load->model('buy_sell_model');
        
        if($post){
            // echo '<pre>'; print_r($post); echo '</pre>';
            if(!isset($post['edeal_fee']) || !isset($post['payment_method_fee'])){ // Check if Charges are also submitted. Considering invalid if charges are not displayed/applicable in Buy.
                $this->session->set_flashdata('error_msg','Please fill the form completely and try again.');
                redirect('staff/buy');
            }
            $data=$post;
            $data['payment_method_details']=$this->buy_sell_model->get_payment_method_details($post['lr_bank']);
            $this->load->view('staff/buy_confirm',$data);
        }else{
            $viewData=array();
            $userDetails=unserialize($this->session->userdata('user_details'));
            if(!empty($userDetails) && $userDetails->account_verification=='0'){
                $viewData['verification_message']='Your account is not verified. Please <a href="'.site_url('staff/profile#photo_id_proof').'">send us your documents</a> for account verification. Your account will be verified with-in 3 hours.';
            }
            $this->load->view('staff/buy',$viewData);
        }
    }

    public function buy_sell_charges(){
        $post=$this->input->post();
        if($post){
            if(is_numeric($post['amount'])){ // Check if amount is valid.
                $amount=$post['amount'];
                $lr_currency=$post['lr_currency'];
                $lr_bank=$post['lr_bank'];
                $charge_type=((isset($post['type']))?$post['type']:'buy');
                if(!empty($amount) && !empty($lr_currency) && !empty($lr_bank)){
                    $this->load->model('buy_sell_model');
                    $data->charges=$this->buy_sell_model->calculate_charges($charge_type,$amount,$lr_currency,$lr_bank);
                    // echo '<pre>'; print_r($data); echo '</pre>';
                    $this->load->view('staff/buy_sell_charges',$data);
                }
            }else{
                $data->error_message='<label class="error">Please enter a valid amount</label>';
                $this->load->view('staff/buy_sell_charges',$data);
            }
        }
    }

    public function user_account_details(){
        $post=$this->input->post();
        if($post){
            $userDetails=unserialize($this->session->userdata('user_details'));
            $this->load->model('buy_sell_model');
            $staffuserID=((!empty($userDetails->id))?$userDetails->id:0);
            $data->account_details=$this->buy_sell_model->staff_account_details($staffuserID,$post['lr_currency']);
            // echo '<pre>'; print_r($data); echo '</pre>';
            $this->load->view('staff/user_account_details',$data);
        }
    }
    
    public function buy_confirm(){
        $userDetails=unserialize($this->session->userdata('user_details'));
        $user_id=$userDetails->id;
        $user_name=((!empty($userDetails->firstname))?$userDetails->firstname.' '.$userDetails->lastname:' user');
        
        // Account Verification Check
        if(!empty($userDetails) && $userDetails->account_verification=='0'){
            $this->session->set_flashdata('error_msg','Your account is not verified. Please <a href="'.site_url('staff/profile#photo_id_proof').'">send us your documents</a> for account verification. Your account will be verified with-in 3 hours.');
            redirect('staff/buy');
            return;
        }
        
        
        $post=$this->input->post();
        if($post){

            // For safety.!! Recalculate the Total Amount, Charges etc based on the User Amount and Back ecurrency selected.
            // Avoiding taking post values for charges and total amount etc...
            $amount=$post['amount'];
            $lr_currency=$post['lr_currency'];
            $lr_bank=$post['lr_bank'];
            if(!empty($amount) && !empty($lr_currency) && !empty($lr_bank)){
                $this->load->model('buy_sell_model');
                
                $data->charges=$this->buy_sell_model->calculate_charges('buy',$amount,$lr_currency,$lr_bank);

                // echo '<pre>'; print_r($post); echo '</pre>';
                // echo '<pre>'; print_r($data); echo '</pre>';

                $orderPost['mask_id']='EDS-B-'.time();
                $orderPost['user_id']=$user_id;
                $orderPost['orders_type']='buy';
                $orderPost['ecurrencies_id']=$post['lr_currency'];
                $orderPost['payment_methods_id']=$post['lr_bank'];
                $orderPost['orders_status_id']='1';
                $orderPost['orders_flags_id']='1';
                $orderPost['amount']=$post['amount'];
                $orderPost['rate']=$data->charges->edeal_fee;
                $orderPost['payment_method_charges']=$data->charges->payment_method_fee;
                $orderPost['account_charges']=$data->charges->ecurrency_fee;
                $orderPost['total']=$data->charges->total_amount;
                $orderPost['actual_amount_received']=0;

                // echo '<pre>'; print_r($orderPost); echo '</pre>';
                
                
                $this->load->library(array('orders_lib','users_ecurrencies_lib','orders_buy_details_lib','orders_charges_lib'));
                
                $this->db->trans_start();
                
                $obj=conversion($orderPost,'orders_lib');
                $order_id=$this->buy_sell_model->save_order($obj);

                /* UPdating Order Mask ID */
                $updateOrderMask['id']=$order_id;
                $updateOrderMask['mask_id']='EDS-B-'.$order_id;
                $objMask=conversion($updateOrderMask,'orders_lib');
                $this->buy_sell_model->save_order($objMask);

                $orderPost['orders_id']=$order_id;
                $orderPost['type']='default';
                $obj=conversion($orderPost,'orders_charges_lib');
                $this->buy_sell_model->save_orders_charges($obj);
                
                // save Buy Details
                $orderBuyDetailsPost['user_id']=$user_id;
                $orderBuyDetailsPost['order_id']=$order_id;
                $orderBuyDetailsPost['users_ecurrencies_id']=$post['lr_currency'];
                $orderBuyDetailsPost['lr_account']=$post['lr_account'];
                $orderBuyDetailsPost['lr_account_name']=$post['lr_account_name'];
                $user_ecurrencies_db_id=$this->buy_sell_model->check_users_ecurrencies($post['lr_account'],$user_id,$post['lr_currency']);
                if($user_ecurrencies_db_id){
                    $orderBuyDetailsPost['users_ecurrencies_id']=$user_ecurrencies_db_id;
                }else{
                    // save the details as new record in user ecurrencies
                    $userEcurrenciesPost['users_id']=$user_id;
                    $userEcurrenciesPost['ecurrencies_id']=$post['lr_currency'];
                    $userEcurrenciesPost['account_name']=$post['lr_account_name'];
                    $userEcurrenciesPost['account_number']=$post['lr_account'];
                    $obj2=conversion($userEcurrenciesPost,'users_ecurrencies_lib');
                    $userEcurrenciesPost['users_ecurrencies_id']=$this->buy_sell_model->save_users_ecurrencies($obj2);
                }
                $obj3=conversion($orderBuyDetailsPost,'orders_buy_details_lib');
                $this->buy_sell_model->save_order_buy_details($obj3);
                // echo '<pre>'; print_r($obj3); echo '</pre>';
                
                $this->db->trans_complete();
                
                if($this->db->trans_status()===FALSE){
                    $this->session->set_flashdata('error_msg','There was some problem in processing your request. Please try again.');
                    redirect('staff/buy');
                    return true;
                }else{
                    // Send Email to User
                    $this->load->model('mail_model');
                    $emailDetails['from']=$this->config->item('from_mail');
                    $emailDetails['to']=((!empty($userDetails->email))?$userDetails->email:'');
                    $emailDetails['subject']='Edealspot - Buy transaction( EDS-B-'.$order_id.' )';
                    $emailDetails['bcc']=$this->config->item('from_mail');
					
                    $emailViewData=$post;
                    $emailViewData['payment_method_details']=$this->buy_sell_model->get_payment_method_details($post['lr_bank']);
                    $emailViewData['subject']=$emailDetails['subject'];
                    $emailViewData['user_name']=$user_name;
                    $emailDetails['message']=$this->load->view('email_templates/email_buy',$emailViewData,TRUE);
                    
					// $this->mail_model->sendMail($emailDetails);
                    $this->mail_model->send_mail($emailDetails);
                    
                    // $this->load->view('email_templates/email_buy',$emailViewData);
                    // return true;
                }
                
                // Using redirect to avoid resubmition of form upon refresh.
                $this->session->set_flashdata('success_msg','Your Order(EDS-B-'.$order_id.') was submitted successfully. Please check your email.');
                redirect('staff/buy');

            }

            
        }else{
            redirect('staff/buy');
        }
    }



    /*
     * SELL Functions Start here
     * 
     */

    public function sell()
    {
        $post=$this->input->post();
        if($post && !empty($post['lr_bank'])){
            // echo '<pre>'; print_r($post); echo '</pre>';
            if(!is_numeric($post['amount'])){ // Check if amount is valid.
                $this->session->set_flashdata('error_msg','Please fill the amount and try again.');
                redirect('staff/sell');
                return true;
            }
            
            if(!isset($post['edeal_fee']) || !isset($post['payment_method_fee'])){ // Check if Charges are also submitted. Considering invalid if charges are not displayed/applicable in Buy.
                $this->session->set_flashdata('error_msg','Please fill the form completely and try again.');
                redirect('staff/sell');
                return true;
            }
            
            $this->load->model('buy_sell_model');
            $data=$post;
            // $data['payment_method_details']=$this->buy_sell_model->get_payment_method_details($post['lr_bank']);
            $data['ecurrency_account_details']=$this->buy_sell_model->get_ecurrency_account_details($post['lr_currency']);
            $this->load->view('staff/sell_confirm',$data);
        }else{
            $viewData=array();
            $userDetails=unserialize($this->session->userdata('user_details'));
            if(!empty($userDetails) && $userDetails->account_verification=='0'){
                $viewData['verification_message']='Your account is not verified. Please <a href="'.site_url('staff/profile#photo_id_proof').'">send us your documents</a> for account verification. Your account will be verified with-in 3 hours.';
            }
            $this->load->view('staff/sell',$viewData);
        }
    }

    public function sell_confirm(){
        $userDetails=unserialize($this->session->userdata('user_details'));
        $user_id=$userDetails->id; 
        $user_name=((!empty($userDetails->firstname))?$userDetails->firstname.' '.$userDetails->lastname:' user');
        
        // Account Verification Check
        if(!empty($userDetails) && $userDetails->account_verification=='0'){
            $this->session->set_flashdata('error_msg','Your account is not verified. Please <a href="'.site_url('staff/profile#photo_id_proof').'">send us your documents</a> for account verification. Your account will be verified with-in 3 hours.');
            redirect('staff/sell');
            return;
        }
        
        
        $post=$this->input->post();
        if($post){

            // For safety.!! Recalculate the Total Amount, Charges etc based on the User Amount and Back ecurrency selected.
            // Avoiding taking post values for charges and total amount etc...
            $amount=$post['amount'];
            $lr_currency=$post['lr_currency'];
            $lr_bank=$post['lr_bank'];
            if(!empty($amount) && !empty($lr_currency) && !empty($lr_bank)){
                $this->load->model('buy_sell_model');
                $data->charges=$this->buy_sell_model->calculate_charges('sell',$amount,$lr_currency,$lr_bank);

                // echo '<pre>'; print_r($post); echo '</pre>';
                // echo '<pre>'; print_r($data); echo '</pre>';

                $orderPost['mask_id']='EDS-S-'.time();
                $orderPost['user_id']=$user_id;
                $orderPost['orders_type']='sell';
                $orderPost['ecurrencies_id']=$post['lr_currency'];
                $orderPost['payment_methods_id']=$post['lr_bank'];
                $orderPost['orders_status_id']='1';
                $orderPost['orders_flags_id']='1';
                $orderPost['amount']=$post['amount'];
                $orderPost['rate']=$data->charges->edeal_fee;
                $orderPost['payment_method_charges']=$data->charges->payment_method_fee;
                $orderPost['payment_method_charges2']=$data->charges->payment_method_fee2;
                $orderPost['account_charges']=$data->charges->ecurrency_fee;
                $orderPost['total']=$data->charges->total_amount;
                $orderPost['actual_amount_received']=0;

                // echo '<pre>'; print_r($orderPost); echo '</pre>';

                $this->load->library(array('orders_lib','orders_sell_details_lib','orders_charges_lib'));
                
                $this->db->trans_start();
                
                $obj=conversion($orderPost,'orders_lib');
                $order_id=$this->buy_sell_model->save_order($obj);

                /* UPdating Order Mask ID */
                $updateOrderMask['id']=$order_id;
                $updateOrderMask['mask_id']='EDS-S-'.$order_id;
                $objMask=conversion($updateOrderMask,'orders_lib');
                $this->buy_sell_model->save_order($objMask);

                $orderPost['orders_id']=$order_id;
                $orderPost['type']='default';
                $obj=conversion($orderPost,'orders_charges_lib');
                $this->buy_sell_model->save_orders_charges($obj);
                
                // echo '<pre>'; print_r($obj); echo '</pre>';
                
                // Save Sell Orde Details
                $post['order_id']=$order_id;
                $obj2=conversion($post,'orders_sell_details_lib');
                $this->buy_sell_model->save_orders_sell_details($obj2);

                $this->db->trans_complete();
                
                if($this->db->trans_status()===FALSE){
                    $this->session->set_flashdata('error_msg','There was some problem in processing your request. Please try again.');
                    redirect('staff/sell');
                    return true;
                }else{
                    // Send Email to User
                    $this->load->model('mail_model');
                    $emailDetails['from']=$this->config->item('from_mail');
                    $emailDetails['to']=((!empty($userDetails->email))?$userDetails->email:'');
                    $emailDetails['subject']='Edealspot - Sell transaction( EDS-S-'.$order_id.' )';
                    $emailDetails['bcc']=$this->config->item('from_mail');
                    $emailViewData=$post;
                    $emailViewData['subject']=$emailDetails['subject'];
                    // $emailViewData['payment_method_details']=$this->buy_sell_model->get_payment_method_details($post['lr_bank']);
                    $emailViewData['ecurrency_account_details']=$this->buy_sell_model->get_ecurrency_account_details($post['lr_currency']);
                    $emailViewData['user_name']=$user_name;
                    $emailDetails['message']=$this->load->view('email_templates/email_sell',$emailViewData,TRUE);
                    // $this->mail_model->sendMail($emailDetails);
                    $this->mail_model->send_mail($emailDetails);
                    
                    // $this->load->view('email_templates/email_sell',$emailViewData);
                    // return true;
                }
                
                // Using redirect to avoid resubmition of form upon refresh.
                $this->session->set_flashdata('success_msg','Your Order(EDS-S-'.$order_id.') has been submitted successfully. Please check your email.');
                redirect('staff/sell');

            }
        }else{
            redirect('staff/sell');
        }
    }

    /*
     *
     * BUY - SELL END
     *
     */


//    public function sell()
//    {
//        $this->load->view('staff/sell');
//    }
    
    
    public function buyoffers()
    {
        $post=$this->input->post(); 
        if($post){
            $this->load->model('buy_sell_model');
            $userDetails=unserialize($this->session->userdata('user_details'));
            $post['user_id']=$userDetails->id;
            echo $this->buy_sell_model->get_offers($post,'buy');
        }else{
            $this->load->view('staff/buyoffers');
        }
    }
    
    public function selloffers()
    {
        $post=$this->input->post(); 
        if($post){
            $this->load->model('buy_sell_model');
            $userDetails=unserialize($this->session->userdata('user_details'));
            $post['user_id']=$userDetails->id;
            echo $this->buy_sell_model->get_offers($post,'sell');
        }else{
            $this->load->view('staff/selloffers');
        }
    }

    public function orders_details($enc_order_id=0){
        /* Encrypted ID Check */
        if(!empty($enc_order_id)){
            $order_id=$this->my_encrypt->decode($enc_order_id);
            if(is_numeric($order_id)){
                // Is a valid order integer number
            }else{
                redirect('staff/buyoffers');
                return;
            }
        }
        if($order_id){
            $this->load->model('buy_sell_model');
            $this->load->library(array('orders_charges_lib','orders_lib'));
            $userDetails=unserialize($this->session->userdata('user_details'));

            /*
             * Save the amount submitted by user
             */
            $post=$this->input->post();

            $orders_details=$this->buy_sell_model->orders_details($order_id);

            if($post){
                
                if(!is_numeric($post['amount'])){
                    $this->session->set_flashdata('error_msg','Please enter a valid amount.');
                    redirect('staff/orders_details/'.$enc_order_id);
                    return true;
                }
                
                $data->charges=$this->buy_sell_model->reverse_calculate_charges('sell',$post['amount'],$orders_details[0]->ecurrencies_id,$orders_details[0]->payment_methods_id);

                $orderPost=$post;
                $orderPost['orders_id']=$order_id;
                $orderPost['user_id']=$userDetails->id;
                $orderPost['type']='reverse';
//                $orderPost['ecurrencies_id']=$post['lr_currency'];
//                $orderPost['payment_methods_id']=$post['lr_bank'];
                $orderPost['amount']=$post['amount'];
                $orderPost['rate']=$data->charges->edeal_fee;
                $orderPost['payment_method_charges']=$data->charges->payment_method_fee;
                $orderPost['payment_method_charges2']=$data->charges->payment_method_fee2;
                $orderPost['account_charges']=$data->charges->ecurrency_fee;
                $orderPost['total']=$data->charges->total_amount;

                $obj=conversion($orderPost,'orders_charges_lib');
                $this->buy_sell_model->save_orders_charges($obj);

                $orderUpdatePost['id']=$order_id;
                $orderUpdatePost['orders_status_id']=2;
                $obj2=conversion($orderUpdatePost,'orders_lib');
                $this->buy_sell_model->save_order($obj2);

                // Using redirect to avoid resubmition of form upon refresh.
                $this->session->set_flashdata('success_msg','Your Details Saved Successfully');
                redirect('staff/orders_details/'.$enc_order_id);

                return true;
            }


            $order_reverse_calculations=$this->buy_sell_model->order_reverse_calculations($order_id);
            // echo '<pre>'; print_r($orders_details); echo '</pre>';

            if(!empty($orders_details)){
                $data=$orders_details[0];
                $data->order_reverse_calculations=$order_reverse_calculations;
                $this->load->view('staff/order_details',$data);
            }
        }
    }

    public function order_messages($enc_order_id=0){
        /* Encrypted ID Check */
        if(!empty($enc_order_id)){
            $order_id=$this->my_encrypt->decode($enc_order_id);
            if(is_numeric($order_id)){
                // Is a valid order integer number
            }else{
                redirect('staff/buyoffers');
                return;
            }
        }
        if($order_id){
            $userDetails=unserialize($this->session->userdata('user_details'));
            $this->load->model('buy_sell_model');
            $post=$this->input->post();
            
            $order_details=$this->buy_sell_model->orders_details($order_id);
            

            if($post){
                $this->load->library('order_messages_lib');
                $post['user_id']=$userDetails->id;
                $post['order_id']=$order_id;
                $obj=conversion($post,'order_messages_lib');
                $this->buy_sell_model->save_order_messages($obj);

                // Send Email to User
                $user_recipients=$this->buy_sell_model->get_users_involved_in_message($userDetails->id,$order_id);
                // echo '<pre>'; print_r($user_recipients); echo '</pre>';
                $this->load->model('mail_model');
                if(!empty ($user_recipients)){
                    foreach ($user_recipients as $key => $value) {
                        $emailDetails['from']=$this->config->item('from_mail');
                        $emailDetails['to']=$value->email;
                        $emailDetails['subject']='Edealspot Order '.$order_details[0]->mask_id.'- You have a new Message';

                        $emailViewData=$post;
                        $emailViewData['mask_id']=$order_details[0]->mask_id;
                        $emailViewData['user_name']= $value->firstname; //$user_name;
                        $emailDetails['message']=$this->load->view('email_templates/order_message_alert',$emailViewData,TRUE);

                        // $this->mail_model->sendMail($emailDetails);
                        $this->mail_model->send_mail($emailDetails);
                    }
                }

                redirect('staff/order_messages/'.$enc_order_id);
                return true;
            }

            $data->user_id=$userDetails->id;
            $data->order_details=$order_details[0];
            $data->order_messages=$this->buy_sell_model->get_order_messages($order_id);

            $this->buy_sell_model->mark_messages_read($userDetails->id,$order_id);

            $this->load->view('staff/order_messages',$data);
        }
    }

    public function testimonials()
    {
        $user_details = unserialize($this->session->userdata['user_details']);
		/*echo '<pre>'; print_r($user_details);die;*/
		$data['user_id'] = $user_details->id;
		
		$this->load->view('staff/testimonials',$data);
    }
    
    public function save_tm()
    {
            $user_details = unserialize($this->session->userdata['user_details']);
            if ($this->formtoken->validateToken($_POST))
            {
                    $_POST['last_modified_by'] =  $user_details->id;
                    $result = $this->testimonials_model->save_tm($_POST);
                    echo $result;
            }
            else
            {
                    die('The form is not valid or has expired.');
            }
    }


    public function getEcurrencies()
    {
        header('Content-Type: application/json');
        echo json_encode($this->users_model->getEcurrencies());
    }

    public function delUserEcurrencies()
    {
        $where_cond = array('id'=>$_POST['ecur_id']);
        $this->users_model->deleteRecord('users_ecurrencies',$where_cond);
    }
}