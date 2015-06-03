<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $userDetails=unserialize($this->session->userdata('user_details'));
        // echo '<pre>'; print_r($this->session->userdata('ctz_offset')); echo '</pre>';
        if(empty($userDetails)){
            redirect('login');
        }
    }
    
    public function index() {
        $this->load->view('welcome_message');
    }

    public function currentorders()
    {
        $post=$this->input->post(); 
        if($post){ 
            $this->load->model('buy_sell_model');
            echo $this->buy_sell_model->get_orders($post);
        }else{
            $this->load->view('orders/currentorders');
        }
    }

    public function archive()
    {
        $this->load->view('orders/archive');
    }
    
    
    public function orders_details($enc_order_id=0){
        /* Encrypted ID Check */
        if(!empty($enc_order_id)){
            $order_id=$this->my_encrypt->decode($enc_order_id);
            if(is_numeric($order_id)){
                // Is a valid order integer number
            }else{
                redirect('orders/currentorders');
                return;
            }
        }
        if($order_id){
            $this->load->model('buy_sell_model');
            $userDetails=unserialize($this->session->userdata('user_details'));
            
            /*
             * Order Status & Reverse Details Submitted
             */
            $post=$this->input->post(); 
            if($post){
                $this->load->library(array('orders_lib','orders_charges_lib'));
                /*
                 * Saving Order Reverse Charges
                 */
                if(!empty($post['amount']) && !empty($post['edeal_fee']) && !empty($post['total_amount'])){
                    $orderChargesPost['orders_id']=$order_id;
                    $orderChargesPost['user_id']=$userDetails->id;
                    $orderChargesPost['amount']=$post['amount'];
                    $orderChargesPost['rate']=$post['edeal_fee'];
                    $orderChargesPost['payment_method_charges']=$post['payment_method_fee'];
                    $orderChargesPost['payment_method_charges2']=$post['payment_method_fee2'];
                    $orderChargesPost['account_charges']=$post['ecurrency_fee'];
                    $orderChargesPost['total']=$post['total_amount'];
                    $orderChargesPost['type']='reverse';
                    
                    $obj=conversion($orderChargesPost,'orders_charges_lib');
                    $this->buy_sell_model->save_orders_charges($obj);
                }
                /*
                 * Saving Order Status
                 */
                if(!empty($post['order_status'])){
                    $orderPost['id']=$order_id;
                    $orderPost['orders_status_id']=$post['order_status'];
                    
                    $obj=conversion($orderPost,'orders_lib');
                    $this->buy_sell_model->save_order($obj);
                }
                
                // Using redirect to avoid resubmition of form upon refresh.
                $this->session->set_flashdata('success_msg','Order Updated Successfully');
                redirect('orders/orders_details/'.$enc_order_id);
                return true;
            }
            
            
            $orders_details=$this->buy_sell_model->orders_details($order_id);
            // echo '<pre>'; print_r($orders_details); echo '</pre>';
            $order_reverse_calculations=$this->buy_sell_model->order_reverse_calculations($order_id);
            
            if(!empty($orders_details)){
                $data=$orders_details[0];
                $user_details=$this->users_model->user_details($orders_details[0]->user_id);
                $data->user_details=$user_details[0];
                $data->order_reverse_calculations=$order_reverse_calculations;
                $this->load->view('orders/order_details',$data);
            }
        }
    }
    
    public function buy_sell_reverse_charges(){
        $post=$this->input->post(); 
        if($post){
            if(is_numeric($post['amount'])){ // Check if amount is valid.
                $amount=$post['amount'];
                $lr_currency=$post['lr_currency'];
                $lr_bank=$post['lr_bank'];
                $charge_type=((isset($post['type']))?$post['type']:'buy');
                if(!empty($amount) && !empty($lr_currency) && !empty($lr_bank)){
                    $this->load->model('buy_sell_model');
                    $data->charges=$this->buy_sell_model->reverse_calculate_charges($charge_type,$amount,$lr_currency,$lr_bank);
                    // echo '<pre>'; print_r($data); echo '</pre>';
                    $this->load->view('orders/buy_sell_reverse_charges',$data);
                }
            }else{
                $data->error_message='Please enter a valid amount';
                $this->load->view('orders/buy_sell_reverse_charges',$data);
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
                redirect('orders/currentorders');
                return;
            }
        }
        if($order_id){
            $this->load->model('buy_sell_model');
            $userDetails=unserialize($this->session->userdata('user_details'));
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

                redirect('orders/order_messages/'.$enc_order_id);
                return true;
            }

            $data->user_id=$userDetails->id;
            $data->order_details=$order_details[0];
            $data->order_messages=$this->buy_sell_model->get_order_messages($order_id);

            $this->buy_sell_model->mark_messages_read($userDetails->id,$order_id);

            $this->load->view('orders/order_messages',$data);
        }
    }
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
