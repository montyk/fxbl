<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pamm_manager extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pamm_manager_model');
    }
	
	public function index()
	{
		$this->load->view('pamm_manager/index');
	}

    function get_managers(){
        echo $this->pamm_manager_model->get_managers();
    }
	
	public function view_manager($pammId)
	{
		$data=$this->pamm_manager_model->view_manager($pammId);
                $redirectpamm='/userpages/join_pamm/'.$pammId;
                $this->session->set_userdata('redirectpamm', $redirectpamm);
                $from=$data->dateadded;
                $to=date("Y-m-d");
                $var = $this->mql_model->MQ_Get_Trading_History($data->login, $data->password,$from,$to);
                if (!$var['error']) {
                     $data->info = explode("\r\n", $var['response']);
                } 
                 $var2 = $this->mql_model->MQ_Login_Account($data->login, $data->password);
                  if (!$var2['error']) {
                  $data->info2 = explode("\r\n", $var2['response']);
                 }
		$this->load->view('pamm_manager/view_manager',$data);
	}
    
	
	public function view_manager2($pammId)
	{
             $mt4request = new CMT4DataReciver;
        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
		$data=$this->pamm_manager_model->view_manager($pammId);
                echo '<pre>';
                print_r($data);
                $params['login'] = $data->login;
                $params['login'] = '101463';
                
                $time    =mktime(23,59,59,date('n'),date('j'),date('Y'));
		$time2=$time-2592000;
                
                
		/*$startTS = $data->dateadded; //echo '</br>';
                echo $startTS = '2013-02-18';
		$endTS = date('Y-m-d H:i:s'); 
		$params['from'] = $time2;
		$params['to'] = $time;*/
                
                echo $startTS = strtotime($data->dateadded); //echo '</br>';
                
                //echo $startTS = strtotime('2014-03-05');
                //echo $startTS = '2013-02-18';
		echo $endTS = strtotime(date('Y-m-d H:i:s')); 
		$params['from'] = $startTS;
		$params['to'] = $endTS;
                
		$answerData2 = $mt4request->MakeRequest("gethistory", $params);        
                echo '<pre>';
                print_r($answerData2);
                $size = sizeof($answerData2['csv']);
                $profit_loss=0;
                for($i = 0; $i < $size; $i++)
                {
                    echo $answerData2['csv'][$i];echo '<br/>';
                    $values = explode(";", $answerData2['csv'][$i]);
                    if($values[12]=='1' || $values[12]=='0')
                    {
                            $profit_loss=$profit_loss+($values[5])+($values[15]);
                    }
                    print_r($values);
                }
                echo $profit_loss;
                exit();
                $data->info=$answerData2;
                $redirectpamm='/userpages/join_pamm/'.$pammId;
                $this->session->set_userdata('redirectpamm', $redirectpamm);
                $from=$data->dateadded;
                $to=date("Y-m-d");
                $var = $this->mql_model->MQ_Get_Trading_History($data->login, $data->password,$from,$to);
                if (!$var['error']) {
                     $data->info_1 = explode("\r\n", $var['response']);
                } 
                 $var2 = $this->mql_model->MQ_Login_Account($data->login, $data->password);
                  if (!$var2['error']) {
                  $data->info2 = explode("\r\n", $var2['response']);
                 }
		$this->load->view('pamm_manager/view_manager_dec9',$data);
	}

    
    

}