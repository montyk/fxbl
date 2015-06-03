<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminnews extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('adminnews/index');
    }

    public function getnewsdata() {
        echo $this->news_model->getnewsdata();
    }

    public function news_view($news_id = 0) {
        $data = new stdclass();
        if (isset($news_id) && $news_id != 0) {
            $news_info = $this->news_model->news_view($news_id);
            if ($news_info) {
                $data = $news_info[0];
                $data->label = 'Edit';
            }
        } else {
            $data = $this->users_model->gettabledetails(array('news'));
            $data->id = 0;
            $data->label = 'Add';
        }
        $data->news_cat = $this->common_model->getTableDetails('id,name', 'news_categories', 'status=1');
        echo $this->load->view('adminnews/news_view', $data, true);
    }

    public function save_news() {
        if ($this->formtoken->validateToken($_POST)) {
            $files = array();
            if (isset($_FILES) && !empty($_FILES)) {
                $files = $_FILES;
            }
            $return_id = $this->news_model->save_news($_POST, $files);
            echo $return_id;
        } else {
            die('The form is not valid or has expired.');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */