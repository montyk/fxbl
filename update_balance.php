<?php			
			$data=$this->pamm_manager_model->get_pammmanagers();
			$mt4request = new CMT4DataReciver;
			//$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
			$mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
			

			foreach($data as $k)
			{
				$params['login'] = $k->login;
				$answerData = $mt4request->MakeRequest("getaccountbalance", $params);
				echo $balance=$answerData['balance'];//echo '</br>';
				$startTS = $k->date_added; //echo '</br>';
				$endTS = date('Y-m-d H:i:s'); 
				$params['login'] = $k->login;
				$params['from'] = strtotime($startTS);
				$params['to'] = strtotime($endTS);
				$answerData2 = $mt4request->MakeRequest("gethistory", $params);
				//echo '<pre>';
				//print_r($answerData2);
				//print_r($answerData2['csv']);
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
					if($list[12]=='1')
					{
						$profit_loss=$profit_loss+($list[5])+($list[15]);
					}
				}
				echo $profit_loss;echo '</br>';
				echo $yield=($profit_loss/$balance)*100;echo '</br>';
				$updatebalance=$this->pamm_manager_model->update_balance($k->id,$balance,$yield);		
			}
			
<?php }?>			