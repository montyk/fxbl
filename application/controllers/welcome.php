<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
        
        function __construct() {
            parent::__construct();
            $this->load->model('test_model');
        }
        
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function russian_test(){
            $post=$this->input->post();
            echo '<h3>POST VALS:<h3>';
            echo '<pre>'; print_r($post); echo '</pre><hr/>';
            if(!empty($post)){
                // Save TO DB.
                $this->test_model->test_saveRecord($post, 'test', 'pages_lib');
                // $post['content']=$this->db->escape($post['content']);
                // $this->test_model->save($post, 'test');
            }
            // Fetch DB and Show.
            $sql = "select * from test ";
            $data['data']= $this->test_model->test_getDBResult($sql, 'object');
            $this->load->view('test/index',$data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */