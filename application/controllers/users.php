<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

    public function index() {
        $this->load->view('users/pluploadeg');
    }

    public function adduser($id=0,$action='')
    {
        //echo $this->session->userdata('ctz_offset');die;
        $data=new stdclass();
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
        if($action == 'myprofile')
        {
            $data->myprofile = 1;
        }
        $data->ecurrencies_json = json_encode($this->users_model->getEcurrencies());
        $this->load->view('users/adduser',$data);
    }

    public function getEcurrencies()
    {
        header('Content-Type: application/json');
        echo json_encode($this->users_model->getEcurrencies());
    }
    
    public function saveuser()
    {
        /*echo '<pre>';
        print_r($_POST);die;*/
        if (formtoken::validateToken($_POST)) {
            if(isset($_POST['email'])) {
                $files = array();
                if(isset($_FILES))
                {
                    $files = $_FILES;
                }
                $this->users_model->save_user($_POST,$files);
                redirect('users/usersgrid');
            }
        }
        else {
            die('The form is not valid or has expired.');
        }
    }

    public function usersgrid()
    {
        $data = array();
        $this->load->view('users/usersgrid',$data);
    }

    public function getusersdata()
    {
        $sql_BACKUP = 'SELECT u.id,firstname,email,mobile_phone,address,c.name as country,state
                    FROM users u
                    LEFT JOIN users_address ua ON ua.users_id = u.id
                    LEFT JOIN users_contacts uc ON uc.users_id = u.id
                    LEFT JOIN countries c ON ua.countries_id = c.id
                    
                    WHERE 1 
                ';
        $sql = 'SELECT attach.id AS attachments,u.id,firstname,email,mobile_phone,address,c.name as country,state
                    FROM users u
                    LEFT JOIN users_address ua ON ua.users_id = u.id
                    LEFT JOIN users_contacts uc ON uc.users_id = u.id
                    LEFT JOIN countries c ON ua.countries_id = c.id
                    LEFT JOIN attachments AS attach ON attach.global_id = u.id AND attach.reference_id = 4
                    
                    WHERE 1 
                ';
        $post=$this->input->post(); 
        // Filters
        if(!empty($post['fname'])){
            $sql.='
                AND u.firstname LIKE "%'.$post['fname'].'%"
                ';
        }
        if(!empty($post['email'])){
            $sql.='
                AND u.email="'.$post['email'].'"
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
                    AND attach.id>0
                    ';
            }else if($post['documents_filter']=='2'){
                $sql.='
                    AND ISNULL(attach.id)
                    ';
            }
        }
        
        $sql.=' 
            GROUP BY u.id ';
        
        $data_flds = array('firstname','email','mobile_phone','address','country','state',"<a class='btn edit_ecur' href='".base_url()."users/adduser/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
	echo $this->users_model->display_grid($_POST,$sql,$data_flds);
    }

    public function libhelp()
    {
        //$tbl_array = array('users','users_address','users_contacts','users_ecurrencies','users_settings');
        $tbl_array = array('users_attachments');
        $data = $this->users_model->gettabledetails($tbl_array);
        /*echo '<pre>';
        print_r($data);*/
        foreach($data as $key=>$val)
        {
            echo 'private $'.$key.';<br>';
        }
    }

    public function updateTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggers($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;
        
        //echo $qry;
    }

    public function insertTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersInsert($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;

        //echo $qry;
    }

    public function deleteTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersDelete($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;

        //echo $qry;
    }

    public function userprofile()
    {
        $user_id = 1;
        redirect('users/adduser/'.$user_id.'/myprofile');
    }

    public function check_ifexist()
    {
        $fields = new stdClass();
        if($_POST['users_id'] != 0)
        {
            $fields->field2 = 'id';
            $fields->value2 = $_POST['users_id'];
        }
        $fields->field = 'email';
        $fields->value = $_POST['email'];
        echo $this->users_model->check_ifexist($fields,'users');
        //return $this->getDBResult($sql, 'object');
    }

    public function changePassword()
    {
        echo $this->users_model->changePassword($_POST);
    }

    public function setUserTimeZone()
    {
        //print_r($_POST);
        $this->session->set_userdata('ctz_offset',$_POST['tz_offset']);
    }

    public function delUserEcurrencies()
    {
        $where_cond = array('id'=>$_POST['ecur_id']);
        $this->users_model->deleteRecord('users_ecurrencies',$where_cond);
    }
    /*public function useredit($userid=0)
    {
        if($userid)
        {
            $userdata = $this->users_model->user_details($userid);
            $data['userdata'] = $userdata[0];
            echo $this->load->view('useredit',$data,true);
        }
        else
        {
            echo 'error';
        }
    }*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
