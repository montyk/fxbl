<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminpages extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('adminpages/index');
    }

    public function add_page($page_id = 0) {
        $data = new stdclass();
        if (isset($page_id) && $page_id != 0) {
            $page_info = $this->pages_model->page_details($page_id);
            if ($page_info) {
                $data = $page_info[0];
            }
            $data->page_id = $page_id;
            $data->sub_heading = 'Edit';
        } else {
            $data = $this->users_model->gettabledetails(array('pages'));
            $data->page_id = 0;
            $data->sub_heading = 'Add';
        }
        /* $html = $this->load->view('pages/add_page_view',$data,true);
          echo $html; */
        $this->load->view('adminpages/add_page', $data);
    }

    public function save_page() {
        if ($this->formtoken->validateToken($_POST)) {
            $post = $this->input->post();
            // $post['content']=addslashes($post['content']);
            $post['plaintext']=str_get_html($post['content'])->plaintext;
            $post['content'];//echo '<br/><br/><br/><br/>';
            str_get_html($post['content'])->plaintext;
           //exit();
            $result = $this->pages_model->save_page($post);
            echo $result;
        } else {
            die('The form is not valid or has expired.');
        }
    }

    public function getpagesdata() {
        echo $this->pages_model->getpagesdata();
    }
	
    public function update_pammfile()
     {
            $pamm=$this->pamm_manager_model->get_pammmanagers();
            $File = $this->config->config['document_root_text']."misc/pammfiles/MAM".time().".properties"; 
            $Handle = fopen($File, 'w') or die('Unable to open File');
            foreach($pamm as $k)
            {
            $Data = "1,"; 
            fwrite($Handle, $Data); 
            $Data = $k->login.","; 
            $pammrelations=$this->pamm_manager_model->get_relations($k->id);
            foreach($pammrelations as $p)
            {
            $Data.=$p->login.',';
            }
            $Data=rtrim($Data,',');
            fwrite($Handle, $Data); 
            echo $Data;
            $Data="\r\n";
            fwrite($Handle,$Data);
            }
             fclose($Handle); 
             
             $this->load->library('ftp');

           // $config['hostname'] = '185.17.151.147';
           // $config['username'] = 'mam_user';
          //  $config['password'] = 'Q!cKf1$Itm@N100';
            $config['hostname'] = MAM_HOST;
            $config['username'] = MAM_USERNAME;
            $config['password'] = MAM_PASSWORD;
            $config['debug'] = TRUE;

            $this->ftp->connect($config);

            $this->ftp->upload($File, 'MAM.properties', 'ascii');

            $this->ftp->close(); 
			redirect('adminusers/pamm_managers/1');
     }
	 
	public function update_balance1()
	{
	$data=$this->pamm_manager_model->get_pammmanagers();
	foreach($data as $k)
	{
            $mqldata = $this->mql_model->MQ_Login_Account($k->login, $k->password);
            if (!$mqldata['error']) {
                $var = new stdclass();
                $var->info = explode("\r\n", $mqldata['response']);
                $beginIndex = 3;
                 if (isset($var->info[$beginIndex]))
                        $balance = $this->mql_model->MQ_GetParam($var->info[$beginIndex]);
                else
                        $balance=0;
                $profit_loss = $this->mql_model->MQ_GetParam($var->info[$beginIndex + 6]);
                $yield=($profit_loss/$balance)*100;
                //exit();
                $updatebalance=$this->pamm_manager_model->update_balance($k->id,$balance,$yield);
            } 
            else
            {	
            redirect('adminusers/');
            }
		
	}
	redirect('adminusers/pamm_managers/2');

	
	}
	
	public function update_balance()
	{
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
					if($list[12]=='1')
					{
						$profit_loss=$profit_loss+($list[5])+($list[15]);
					}
				}
				$profit_loss;//echo 'profit</br>';
				$yield=($profit_loss/$balance)*100;//echo 'yield</br>';
				$updatebalance=$this->pamm_manager_model->update_balance($k->id,$balance,$yield);		
			}
			redirect('adminusers/pamm_managers/2');

	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */