<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Updatebalance extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

			$data=$this->pamm_manager_model->get_pammmanagers();
			
			$mt4request = new CMT4DataReciver;
			//$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
			$mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
			
			foreach($data as $k)
			{
				$params['login'] = $k->login;//echo 'login</br>';
				$answerData = $mt4request->MakeRequest("getaccountbalance", $params);
				$balance=$answerData['balance'];//echo 'balance</br>';
				$startTS = $k->fromdate; //echo '</br>';
				$endTS = date('Y-m-d H:i:s'); 
				$params['login'] = $k->login;
				$params['from'] = strtotime($startTS);
				$params['to'] = strtotime($endTS);
				$answerData2 = $mt4request->MakeRequest("gethistory", $params);
				$x=$answerData2['csv'];
				//echo count($answerData2['csv']);//exit();
				$profit_loss=0;
				for($i=0;$i<count($answerData2['csv']);$i++)
				{
					$y=$x[$i];
					//echo $y;
					//echo '<br/>';
					$list=explode(';',$y);
					//print_r($list);
					//echo $list[5];
					if($list[12]=='1' || $list[12]=='0')
					{
						$profit_loss=$profit_loss+($list[5])+($list[15]);
					}
				}
				$profit_loss;//echo 'profit</br>';
				$yield=($profit_loss/$balance)*100;//echo 'yield</br>';
				$updatebalance=$this->pamm_manager_model->update_balance($k->id,$balance,$yield);		
			}
			echo 'updated successfully';

    }
	
	public function test()
	{
		echo 'coming';
	}

 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */