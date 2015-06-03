<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author RAJU
 */
class Users_model extends MY_Model {
//put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function save_user($post=array(),$files=array()) {
        if($post['id'] != 0)
        {
            $user_id = $this->saveRecord(conversion($post,'users_lib'),'users',array('id'=>$post['id']));
        }
        else
        {
            $_POST['varification_status'] = '1';
            $post['users_id'] = $user_id = $this->saveRecord(conversion($post,'users_lib'),'users');
        }

        /*if(!empty($files))
        {
            $ret_data = $this->do_upload($files);
            $post['display_name'] = $ret_data['upload_data']['file_name'];
            $post['original_name'] = $ret_data['original_name'];
            $post['url'] = $ret_data['upload_data']['full_path'];
            $post['attachments_id'] = $this->save_attachments($post);
        }*/
        if(isset($post['original_file_name']) && !empty($post['original_file_name']) && $user_id !=0)
        {
            $ref_id = $this->common_model->getReferenceID('users');
            if($post['id']!=0)
            {
                $user_id =  $post['id'];
                $this->common_model->delete_attachments($post['id'],$ref_id);
            }
            $db_file_name = $post['db_file_name'];
            $original_file_name = $post['original_file_name'];
            $url = 'uploads/'.$post['db_file_name'];
            $global_id = $user_id;
            $reference_id = $ref_id;
            $_POST['attachments_id'] = $this->fileupload_model->save_attachment($db_file_name,$original_file_name,$global_id,$reference_id);
        }
        $this->save_user_details($post);
        return $user_id;
    }

    
    function save_attachments($post)
    {
        return $this->saveRecord(conversion($post,'attachments_lib'),'attachments');
    }
    
    function save_user_details($post)
    {
        $tbl_array = array('users_address','users_contacts','users_settings');
        foreach($tbl_array as $table)
        {
            if($post['id'] == 0)
            {
                $this->saveRecord(conversion($post,$table.'_lib'),$table);
            }
            else
            {
                $savingPost=$post; $savingPost['id']=0;
                $this->saveRecord(conversion($savingPost,$table.'_lib'),$table,array('users_id'=>$post['id']));
            }
        }
        if($post['id'] != 0) // delete if user exists
        {
            $where_cond = array('users_id'=>$post['id']);
            /*$this->deleteRecord('users_ecurrencies',$where_cond);*/
            $post['users_id'] = $data['users_id'] = $post['id'];
            //$this->deleteRecord('users_attachments',$where_cond);
        }
        else
        {
            $data['users_id'] = $post['users_id'];
        }
        //$data['attachments_id'] = $post['attachments_id'];
        //$this->saveRecord(conversion($data,'users_attachments_lib'),'users_attachments');

        $loop_cnt = count($post['mul_ecur']['ecurrencies_id']);
        for($index=0;$index<$loop_cnt;$index++)
        {
            // edit old records
            foreach($post['mul_ecur'] as $fld=>$vals)
            {
                $data[$fld] = $vals[$index];
            }
            $this->saveRecord(conversion($data,'users_ecurrencies_lib'),'users_ecurrencies',array('id'=>$data['id']));
        }
        
        // insert new records
        if(!empty($post['mul_ecur_new']))
        {
            /*echo '<pre>';
            print_r($post['mul_ecur_new']);die;*/
            $loop_cnt = count($post['mul_ecur_new']['ecurrencies_id']);
            $data_new = array();
            $data_new['users_id'] = $post['users_id'];
            for($index=0;$index<$loop_cnt;$index++)
            {
                foreach($post['mul_ecur_new'] as $fld=>$vals)
                {
                    $data_new[$fld] = $vals[$index];
                }
                /*echo '<pre>';
                print_r($data_new);die;*/
                $this->saveRecord(conversion($data_new,'users_ecurrencies_lib'),'users_ecurrencies');
            }
        }
        //die;
    }

    function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }
    function display_grid1($postvals,$sql,$array_fields,$orderby) {
        return $this->jqgrid($postvals,$sql,$array_fields,$orderby);
    }
    
    function select_login($id) {
        $sql="select * from login where id='".$id."' ";
        return $this->getDBResult($sql, 'object');
    }

    function user_details($userid = 0) {
        $ref_id = $this->common_model->getReferenceID('users');
        $sql_OLD = "SELECT u.id,u.login,email,password,firstname,lastname,company,register_types_id,business_types_id,u.status,u.date_added,u.last_modified,dob,varification_status,account_verification,u.city,u.state,
                    address,zip,countries_id,isd_code,otp,home_phone,mobile_phone,office_phone,fax_no,languages_id,time_zones_id,time_zone,communicate_lang,time_to_call,newsletter,ip_security,security_questions_id,security_answer
                    FROM users u
                    LEFT JOIN users_address ua ON ua.users_id = u.id
                    LEFT JOIN users_contacts uc ON uc.users_id = u.id
                    LEFT JOIN users_settings us ON us.users_id = u.id
                    where u.id='" . $userid . "' ";
        $sql = "SELECT u.*
                    FROM users u
                    LEFT JOIN users_settings us ON us.users_id = u.id
                    where u.id='" . $userid . "' ";
        $ecur_sql = 'select * from users_ecurrencies WHERE users_id = ' . $userid;
        $attach_sql = 'select url,original_file_name,db_file_name,id as att_id from attachments WHERE global_id = ' . $userid . ' and reference_id = ' . $ref_id;
        $data = $this->getDBResult($sql, 'object');
//        $data[0]->ecur_details = $this->getDBResult($ecur_sql, 'object');
//        $data[0]->attach_details = $this->getDBResult($attach_sql, 'object');
        //echo '<pre>';print_r($data);die;
        return $data;
    }

    function gettabledetails($tablenames=array())
    {
        $tbl_fields = new stdclass();
        foreach($tablenames as $tablename)
        {
            $sql = "show columns from `".$tablename."`";
            $fields = $this->getDBResult($sql, 'object');
            foreach($fields as $values)
            {
                $fld = $values->Field;
                $tbl_fields->$fld = '';
            }
        }
        return $tbl_fields;
    }

    function check_ifexist($fields,$table)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE '.$fields->field.'="'.$fields->value.'"';
        if(isset($fields->field2))
        {
            $sql.= ' AND '.$fields->field2.'!="'.$fields->value2.'"';
        }
        $rs = $this->db->query($sql);
        return $rs->num_rows();
    }

    function getMasterData()
    {
        $sql = 'select id,name from languages';
        $data->languages = $this->getDBResult($sql, 'object');
        $sql = 'select id,name from ecurrencies';
        $data->ecurrencies = $this->getDBResult($sql, 'object');
        $sql = 'select id,name from security_questions';
        $data->security_questions = $this->getDBResult($sql, 'object');
        $sql = 'select id,name from register_types';
        $data->register_types = $this->getDBResult($sql, 'object');
        $sql = 'select id,name from business_types';
        $data->business_types = $this->getDBResult($sql, 'object');
        $sql = 'select id,name from countries';
        $data->countries = $this->getDBResult($sql, 'object');
        return $data;
    }

    function getEcurrencies()
    {
        $sql = 'select id,name from ecurrencies';
        $data = $this->getDBResult($sql, 'array');
        return $data;
    }

    function changePassword($post)
    {
        $sql = 'select password from users where id = '.$post['users_id'];
        $data = $this->getDBResult($sql, 'object');
        if($post['old_pwd'] === $data[0]->password)
        {
            $update_sql = 'update users set password = '.$post['new_pwd']. ' where id = '.$post['users_id'];
            if($this->db->query($update_sql))
            {
                return 'success';
            }
            else
            {
                return 'fail';
            }
        }
        else
        {
            return 'invalid';
        }
    }

    /*function myTriggers($tbl_name = '')
    {
        $data = $this->gettabledetails(array($tbl_name));
        $sql = '';
        $sql .= 'DELIMITER $$$
                DROP TRIGGER IF EXISTS after'.$tbl_name.'Update;
                CREATE TRIGGER after'.$tbl_name.'Update AFTER UPDATE ON '.$tbl_name.'
                FOR EACH ROW
                BEGIN
                DECLARE main_id int;
                INSERT INTO update_history_main(modify_date, table_involved)
                VALUES(NOW(),"'.$tbl_name.'");
                SELECT LAST_INSERT_ID() INTO main_id;';
        $exclude_array = array('last_modified');
        foreach($data as $key=>$val)
        {
            if(!in_array($key,$exclude_array))
            {
                $sql .= 'IF (new.'.$key.' != old.'.$key.') THEN
                    INSERT INTO update_history_details(update_history_main_id, field_name,
                    old_value,new_value)
                    VALUES (main_id, "'.$key.'",old.'.$key.',new.'.$key.');
                    END IF;<br>';
            }
        }
        $sql .= 'END
                $$$';
        return $sql;
        // echo '<pre>';
        //print_r($data);
        
    }*/
    function myTriggers($tbl_name = '')
    {
        $data = $this->gettabledetails(array($tbl_name));
        $sql = '';
        $sql .= 'DELIMITER $$$
                DROP TRIGGER IF EXISTS after'.$tbl_name.'Update;
                CREATE TRIGGER after'.$tbl_name.'Update AFTER UPDATE ON '.$tbl_name.'
                FOR EACH ROW
                BEGIN
                DECLARE main_id int;';

        $exclude_array = array('last_modified');

        $checksql = 'IF (';
        $sql_inner = '';
        foreach($data as $key=>$val)
        {
            if(!in_array($key,$exclude_array))
            {
                $checksql .= ' (new.'.$key.' != old.'.$key.') || ';
                $sql_inner .= 'IF (new.'.$key.' != old.'.$key.') THEN
                    INSERT INTO update_history_details(update_history_main_id, field_name,
                    old_value,new_value)
                    VALUES (main_id, "'.$key.'",old.'.$key.',new.'.$key.');
                    END IF;<br>';
            }
        }
        $sql .= "\n".rtrim($checksql,' || ')."\n". ') THEN'."\n";
        $sql .= ' INSERT INTO update_history_main(modify_date, table_involved, action )
                VALUES(NOW(),"'.$tbl_name.'","update");
                SELECT LAST_INSERT_ID() INTO main_id;';
        $sql .= $sql_inner;
        $sql .= 'END IF;';
        $sql .= 'END
                $$$';
        return $sql;
         /*echo '<pre>';
        print_r($data);*/

    }

    function myTriggersInsert($tbl_name = '')
    {
        $data = $this->gettabledetails(array($tbl_name));
        $sql = '';
        $sql .= 'DELIMITER $$$
                DROP TRIGGER IF EXISTS after'.$tbl_name.'Insert;
                CREATE TRIGGER after'.$tbl_name.'Insert AFTER INSERT ON '.$tbl_name.'
                FOR EACH ROW
                BEGIN
                DECLARE main_id int;';

        $exclude_array = array();

        $sql_inner = '';
        foreach($data as $key=>$val)
        {
            if(!in_array($key,$exclude_array))
            {
                $sql_inner .= 'INSERT INTO update_history_details(update_history_main_id, field_name,
                    old_value,new_value)
                    VALUES (main_id, "'.$key.'","",new.'.$key.');
                    <br>';
            }
        }
        $sql .= ' INSERT INTO update_history_main(modify_date, table_involved, action )
                VALUES(NOW(),"'.$tbl_name.'","insert");
                SELECT LAST_INSERT_ID() INTO main_id;';
        $sql .= $sql_inner;
        $sql .= 'END
                $$$';
        return $sql;
    }
    
    function myTriggersDelete($tbl_name = '')
    {
        $data = $this->gettabledetails(array($tbl_name));
        $sql = '';
        $sql .= 'DELIMITER $$$
                DROP TRIGGER IF EXISTS after'.$tbl_name.'Delete;
                CREATE TRIGGER after'.$tbl_name.'Delete AFTER DELETE ON '.$tbl_name.'
                FOR EACH ROW
                BEGIN
                DECLARE main_id int;';

        $exclude_array = array();

        $sql_inner = '';
        foreach($data as $key=>$val)
        {
            if(!in_array($key,$exclude_array))
            {
                $sql_inner .= 'INSERT INTO update_history_details(update_history_main_id, field_name,
                    old_value,new_value)
                    VALUES (main_id, "'.$key.'",old.'.$key.',"");
                    <br>';
            }
        }
        $sql .= ' INSERT INTO update_history_main(modify_date, table_involved, action )
                VALUES(NOW(),"'.$tbl_name.'","delete");
                SELECT LAST_INSERT_ID() INTO main_id;';
        $sql .= $sql_inner;
        $sql .= 'END
                $$$';
        return $sql;
    }
    
    
    public function activateUserID($user_id)
    {
        $get_sql = 'select * from users where id = "'.$user_id.'" ';
        $data = $this->getDBResult($get_sql, 'object');
        
        // CHECKS FOR EXISTING USER AND INACTIVE ACCOUNT
        if(empty($data[0])){
            $this->session->set_flashdata('error_msg','Invalid activation. Please contact Administrator.');
            redirect('login');
            return;
        }
        
        if(!empty($data[0]->varification_status) && $data[0]->varification_status=='1'){
            $this->session->set_flashdata('info_msg',' Looks like you already activated your account. You can Login now.');
            redirect('login');
            return;
        }
        
        // ELSE CONTNUE WITH PROCESS
        
        $next_day_of_created_time = strtotime('+1 day', strtotime($data[0]->date_added));
        $date = new DateTime();
        $cur_time = $date->getTimestamp();
        // echo $cur_time ,' <> ', $next_day_of_created_time; die;
        
        if($cur_time < $next_day_of_created_time)
        {
            
            // Include the login info for saving.
            $loginNum=$post['login']=  rand(10000, 99999);

            
            $sql = 'update users set login="'.$loginNum.'", varification_status = "1" where id = "'.$user_id.'" ';
            $this->db->query($sql);
            
            if(!empty($data[0]->id) && $data[0]->varification_status=='0'){
                $emailMessage='<p>Please find your Login Details are as below.</p><br/><p>Login: '.$loginNum.'</p><p>Password: '.$data[0]->password.'</p>';
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($data[0]->email);
                $email_data['subject'] = 'ForexRay Registration - Login Credentials';
                $email_data['email_header']='ForexRay - Account Login Credentials';
                $email_data['name'] = ucfirst($data[0]->firstname);
                $email_data['message'] = $emailMessage;
                $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);
                $this->mail_model->send_mail($email_data);
            }
            
            $this->session->set_flashdata('success_msg','Welcome to ForexRay. Your account is activated. You can Login now.');
            redirect('login');
            // echo 'Your account is activated';
        }
        else
        {
            $this->session->set_flashdata('error_msg','You have not activated your account with in given time, Please contact Administrator for further details');
            redirect('login');
        }
    }
    

    public function activateUser($email = '')
    {
        $get_sql = 'select * from users where email = "'.urldecode($this->db->escape_str($email)).'"';
        $data = $this->getDBResult($get_sql, 'object');
        
        $next_day_of_created_time = strtotime('+1 day', strtotime($data[0]->date_added));
        $date = new DateTime();
        $cur_time = $date->getTimestamp();
        // echo $cur_time ,' <> ', $next_day_of_created_time; die;
        
        if(!empty($data[0]->varification_status) && $data[0]->varification_status=='1'){
            $this->session->set_flashdata('info_msg','You seem have already activated your account. You can Login now.');
            redirect('login');
            return;
        }
        
        if($cur_time < $next_day_of_created_time)
        {
            
            // Include the login info for saving.
            $loginNum=$post['login']=  rand(10000, 99999);

            
            $sql = 'update users set login="'.$loginNum.'", varification_status = "1" where email = "'.urldecode($this->db->escape_str($email)).'"';
            $this->db->query($sql);
            
            if(!empty($data[0]->id) && $data[0]->varification_status=='0'){
                $emailMessage='<p>Please find your Login Details are as below.</p><br/><p>Login: '.$loginNum.'</p><p>Password: '.$data[0]->password.'</p>';
                $email_data['from'] = $this->config->item('from_mail');
                $email_data['to'] = $this->db->escape_str($data[0]->email);
                $email_data['subject'] = 'ForexRay Registration - Login Credentials';
                $email_data['email_header']='ForexRay Registration - Account Login Credentials';
                $email_data['name'] = ucfirst($data[0]->firstname);
                $email_data['message'] = $emailMessage;
                $email_data['content'] =  $this->load->view('email_templates/user_reg',$email_data,true);
                $result = $this->mail_model->send_mail($email_data);
            }
            
            $this->session->set_flashdata('success_msg','Welcome to ForexRay. Your account is activated. You can Login now.');
            redirect('login');
            // echo 'Your account is activated';
        }
        else
        {
            $this->session->set_flashdata('error_msg','You have not activated your account with in given time, Please contact Administrator for further details');
            redirect('login');
        }
    }
    
    
    function check_email($email){
        $get_sql = 'select * from users where email = "'.trim($email).'"';
        $data = $this->getDBResult($get_sql, 'object');
        return $data;
    }
    
    function save_registration($post){
        $this->load->library('users_lib');
        if ($post['id']) {
            return $this->saveRecord(conversion($post, 'users_lib'), 'users', array('id' => $post['id']),false);
        } else {
            return $this->saveRecord(conversion($post, 'users_lib'), 'users',array(),false);
        }
    }
    
    function save_proof_of_identity($post){
        return $this->saveRecord(conversion($post,'proof_of_identity_lib'),'proof_of_identity');
    }

    function save_proof_of_residency($post){
        return $this->saveRecord(conversion($post,'proof_of_residency_lib'),'proof_of_residency');
    }

    function save_additional_documents($post){
        return $this->saveRecord(conversion($post,'additional_documents_lib'),'additional_documents');
    }
    
    function get_adminusers(){
        $sql = 'SELECT poi.id AS attachments,u.id,firstname,email,login,phone,address,c.name AS country,state,g.name as group_name,
                    IF(account_verification="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS account_verification_label,
                    IF(u.status="1","<span style=\'color:green\'>Active</span>","<span style=\'color:red\'>In Active</span>") AS user_status,
                    IF(u.varification_status="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS varification_status_label,
                    IF(u.account_verification="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS account_verification_label,
                    IF(u.registration_type="real","<span style=\'color:green\'>Real Account</span>","<span style=\'color:#ccc\'>Demo</span>") AS registration_type_label
                    FROM users u
                    LEFT JOIN countries c ON u.country_id = c.id
                    LEFT JOIN proof_of_identity AS poi ON poi.user_id = u.id
                    LEFT JOIN groups as g ON u.group_id=g.id
                    
                    WHERE 1 
                ';
        
        $post=$this->input->post(); 
        
        if(!empty($post['name'])){
            $sql.=' AND p.name LIKE "%'.$post['name'].'%"';
        }
        if(!empty($post['fname'])){
            $sql.='
                AND u.firstname LIKE "%'.$post['fname'].'%"
                ';
        }
        if(!empty($post['email'])){
            $sql.='
                AND u.email ="'.$post['email'].'"
                ';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        
        if(!empty($post['account_verification'])){
            if($post['account_verification']=='1'){
                $sql.='
                    AND u.account_verification="1"
                    ';
            }else if($post['account_verification']=='2'){
                $sql.='
                    AND u.account_verification="0"
                    ';
            }
        }
        if(!empty($post['documents_filter'])){
            if($post['documents_filter']=='1'){
                $sql.='
                    AND poi.id>0
                    ';
            }else if($post['documents_filter']=='2'){
                $sql.='
                    AND ISNULL(poi.id)
                    ';
            }
        }
        if(!empty($post['group'])){
            $sql.=' AND u.group_id="'.$post['group'].'"';
        }
        
        $sql.=' 
            GROUP BY u.id ';
        
        
        
        $data_flds = array('firstname','email','login','group_name',"<a class='btn edit_ecur' href='".site_url('adminusers')."/add_wallet/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Add Wallet</span></span></a>",'phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->users_model->display_grid($_POST,$sql,$data_flds);
    }
    
    function user_proof_of_identity($user_id=0){
        if(!empty($user_id)){
            $get_sql = 'SELECT a.* FROM 
                        attachments AS a
                        INNER JOIN proof_of_identity AS p ON p.attachments_id=a.id
                        WHERE p.user_id = "'.$user_id.'"';
            $data = $this->getDBResult($get_sql, 'object');
            return $data;
        }
    }
    
    function user_proof_of_residency($user_id=0){
        if(!empty($user_id)){
            $get_sql = 'SELECT a.* FROM 
                        attachments AS a
                        INNER JOIN proof_of_residency AS p ON p.attachments_id=a.id
                        WHERE p.user_id = "'.$user_id.'"';
            $data = $this->getDBResult($get_sql, 'object');
            return $data;
        }
    }
    
    function user_additional_documents($user_id=0){
        if(!empty($user_id)){
            $get_sql = 'SELECT a.* FROM 
                        attachments AS a
                        INNER JOIN additional_documents AS p ON p.attachments_id=a.id
                        WHERE p.user_id = "'.$user_id.'"';
            $data = $this->getDBResult($get_sql, 'object');
            return $data;
        }
    }
    
    
    function get_wallet($user_id)
    {
        $sql='SELECT wallet,account_for,account_verification,login FROM users WHERE id="'.$user_id.'"';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
        $pamm_details = $rs->first_row();
        }
        else
        $pamm_details='';
        return $pamm_details;
     }
     
     function update_wallet($user_id,$bal){
            $sql = 'update users set wallet="'.$bal.'", deposit_status="Y" where id = "'.$user_id.'" ';
            $this->db->query($sql);
     }
    
    function get_investorusers(){
        $sql = 'SELECT poi.id AS attachments,u.id,firstname,email,login,phone,address,c.name AS country,state,deposit_status,
                    IF(account_verification="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS account_verification_label,
                    IF(u.status="1","<span style=\'color:green\'>Active</span>","<span style=\'color:red\'>In Active</span>") AS user_status,
                    IF(u.deposit_status="Y","<span style=\'color:green\'>YES</span>","<span style=\'color:red\'>NO</span>") AS user_deposit_status,
                    IF(u.varification_status="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS varification_status_label,
                    IF(u.account_verification="1","<span style=\'color:green\'>Verified</span>","<span style=\'color:red\'>Not Verified</span>") AS account_verification_label,
                    IF(u.registration_type="real","<span style=\'color:green\'>Real Account</span>","<span style=\'color:#ccc\'>Demo</span>") AS registration_type_label
                    FROM users u
                    LEFT JOIN countries c ON u.country_id = c.id
                    LEFT JOIN proof_of_identity AS poi ON poi.user_id = u.id
                    WHERE 1 AND u.account_for="2" 
                ';
        
        $post=$this->input->post(); 
        
        if(!empty($post['name'])){
            $sql.=' AND p.name LIKE "%'.$post['name'].'%"';
        }
        if(!empty($post['fname'])){
            $sql.='
                AND u.firstname LIKE "%'.$post['fname'].'%"
                ';
        }
        if(!empty($post['email'])){
            $sql.='
                AND u.email ="'.$post['email'].'"
                ';
        }
        if(!empty($post['login'])){
            $sql.='
                AND u.login ="'.$post['login'].'"
                ';
        }
        
        if(!empty($post['account_verification'])){
            if($post['account_verification']=='1'){
                $sql.='
                    AND u.account_verification="1"
                    ';
            }else if($post['account_verification']=='2'){
                $sql.='
                    AND u.account_verification="0"
                    ';
            }
        }
        if(!empty($post['documents_filter'])){
            if($post['documents_filter']=='1'){
                $sql.='
                    AND poi.id>0
                    ';
            }else if($post['documents_filter']=='2'){
                $sql.='
                    AND ISNULL(poi.id)
                    ';
            }
        }
        
        $sql.=' 
            GROUP BY u.id ';
        
        
        
        $data_flds = array('firstname','email','login','user_deposit_status',"<a class='btn edit_ecur' href='".site_url('adminusers')."/add_wallet/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Add Wallet</span></span></a>",'phone','address','country','state','user_status','varification_status_label','account_verification_label','registration_type_label',"<a class='btn edit_ecur' href='".site_url('adminusers')."/edituser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->users_model->display_grid1($_POST,$sql,$data_flds,'u.deposit_status');
    }
    
    function userdata($userid)
    {
        $sql='SELECT id,firstname,lastname,email,login,deposit_status FROM users WHERE id="'.$userid.'"';
         $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
        $user_details = $rs->first_row();
        }
        else
        $user_details='';
        return $user_details;
    }
    
    function save_depositstatus($data)
    {
        $sql = 'update users set deposit_status="'.$data['deposit_status'].'" where id = "'.$data['userid'].'" ';
        $this->db->query($sql);
    }
	
    function is_user_exists($login)
    {
        $sql='SELECT id,firstname,lastname,email,login,deposit_status,wallet,account_for FROM users WHERE login="'.$login.'" AND status="1"';
         $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
        $user_details = $rs->first_row();
        }
        else
        $user_details='';
        return $user_details;
    }
	
    function save_password($login,$pwd)
    {
        $sql = 'update users set password="'.$pwd.'" where login = "'.$login.'" ';
        $this->db->query($sql);
    }
    
    function mydata($userid)
    {
        $sql='SELECT id,firstname,email,login,city,state,zip,address,country_id,isd_code,otp,phone,phone_password FROM users WHERE id="'.$userid.'"';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
        $user_details = $rs->first_row();
        }
        else
        $user_details='';
        return $user_details;
    }
    
    function is_user($userid)
    {
        $sql='SELECT id,login FROM users WHERE id="'.$userid.'"';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
        return TRUE;
        }
        else
        return FALSE;
    }
	
	function useremails()
    {
        return $query = $this->db->query("SELECT DISTINCT email FROM users ORDER BY email ASC");
    }
    
	function getCountries()
    {
        $sql='SELECT id,name,isd_code FROM countries WHERE status="1"';
        $rs = $this->db->query($sql);
        return $rs;
    }
	

	
	
}