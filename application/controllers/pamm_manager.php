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
                $mt4request = new CMT4DataReciver;
                //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);

		$data=$this->pamm_manager_model->view_manager($pammId);
                $redirectpamm='/userpages/join_pamm/'.$pammId;
                $this->session->set_userdata('redirectpamm', $redirectpamm);
                $from=$data->dateadded;
                $to=date("Y-m-d 23:59:59");
                /*$var = $this->mql_model->MQ_Get_Trading_History($data->login, $data->password,$from,$to);
                if (!$var['error']) {
                     $data->info = explode("\r\n", $var['response']);
                } 
                 $var2 = $this->mql_model->MQ_Login_Account($data->login, $data->password);
                  if (!$var2['error']) {
                  $data->info2 = explode("\r\n", $var2['response']);
                 }
                */
                 //echo $data->login;echo '<br/>';
                 
                $params['login'] = $data->login;
                $answerData = $mt4request->MakeRequest("getmargininfoex",$params);
                //echo '<pre>';
                //print_r($answerData);
                $data->balance=$balance=$answerData['balance'];
                $data->margin=$answerData['margin'];
                $data->free_margin=$answerData['freeMargin'];
                $data->equity=$answerData['equity'];
                //exit();
                $startTS = strtotime(date($from)); 
                $endTS = strtotime(date($to)); 
                $params['from'] = $startTS;
                $params['to'] = $endTS;
                $data->answerData2=$answerData2 = $mt4request->MakeRequest("gethistory", $params);   
                $data->xaxissize = $size = sizeof($answerData2['csv']);//echo '<br/>';
                        //$profit_loss=0;
                $xaxis='';
                $sum=0;
                for($i = 0; $i <= $size; $i++)
                {
                    if($i==0)
                        $balance=$balance;
                    else
                    $balance=$bal[$i-1];
                    $answerData2['csv'][$i];
                    $values = explode(";", $answerData2['csv'][$i]);
                   $xaxis[$i]=$values[5]+$values[14]+$values[15];//echo '<br/>';
                   if($i==0)
                        $bal[$i]=$balance;
                   else
                        $bal[$i]=$balance-($xaxis[$i-1]);//echo '<br/>';
                }
                //print_r($xaxis);
                //print_r($bal);
                $data->bal=$bal;                 
		$this->load->view('pamm_manager/view_manager',$data);
	}
    
	
	public function view_manager2($pammId)
	{
                $mt4request = new CMT4DataReciver;
                //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
                $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
		$data=$this->pamm_manager_model->view_manager($pammId);
                $redirectpamm='/userpages/join_pamm/'.$pammId;
                $this->session->set_userdata('redirectpamm', $redirectpamm);
                //echo '<pre>';
                //print_r($data);
                
                $params['login'] = $data->login;
                $answerData = $mt4request->MakeRequest("getmargininfoex",$params);
                $data->balance=$balance=$answerData['balance'];
                $data->margin=$answerData['margin'];
                $data->free_margin=$answerData['freeMargin'];
                $data->equity=$answerData['equity'];

                
                $params['login'] = $data->login;
                $startTS = strtotime($data->dateadded);
		$endTS = strtotime(date('Y-m-d H:i:s')); 
		$params['from'] = $startTS;
		$params['to'] = $endTS;
                
		$data->answerData2 = $mt4request->MakeRequest("gethistory", $params);        
                echo '<pre>';
                print_r($answerData2);
                
                exit();
		$this->load->view('pamm_manager/view_manager_dec9',$data);
	}

    
    

}