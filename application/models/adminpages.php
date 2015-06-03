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
			//echo $Data;
            $Data="\r\n";
            fwrite($Handle,$Data);
            }
             fclose($Handle); 
             
             $this->load->library('ftp');

           // $config['hostname'] = '185.17.151.147';
           // $config['username'] = 'mam_user';
          //  $config['password'] = 'Q!cKf1$Itm@N100';
            $config['hostname'] = '91.109.24.215';
            $config['username'] = 'ftp_user';
            $config['password'] = 'D@ta!100';
            $config['debug'] = TRUE;

            $this->ftp->connect($config);

            $this->ftp->upload($File, 'MAM.properties', 'ascii');

            $this->ftp->close(); 
			redirect('adminusers/pamm_managers/1');
     }
	 
	public function update_balance()
	{
	$data=$this->pamm_manager_model->get_pammmanagers();
			echo '<pre>';
			print_r($data);
	foreach($data as $k)
	{
            $mqldata = $this->mql_model->MQ_Login_Account($k->login, $k->password);
			echo '<pre>';
			print_r($mqldata);
			echo '---------------';
			
            if (!$mqldata['error']) {
                $var = new stdclass();
                $var->info = explode("\r\n", $mqldata['response']);
                $beginIndex = 3;
                 if (isset($var->info[$beginIndex]))
                        $balance = $this->mql_model->MQ_GetParam($var->info[$beginIndex]);
                else
                        $balance=0;
				echo $balance;		
				$beginIndex = 3;
				$size = sizeof($info);
				for ($i = $beginIndex; $i < $size; $i++) {
					if ($info[$i] === '0'){
						break;
					}
				}
				echo $profit_loss = $this->mql_model->MQ_GetParam($info[$i + 6]);
						
                //$profit_loss = $this->mql_model->MQ_GetParam($var->info[$beginIndex + 6]);
                echo $yield=($profit_loss/$balance)*100;
                //exit();
                //$updatebalance=$this->pamm_manager_model->update_balance($k->id,$balance,$yield);
            } 
            else
            {	
			echo $mqldata['error'];
            //redirect('adminusers/');
            }
		exit();
	}
	redirect('adminusers/pamm_managers/2');

	
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */