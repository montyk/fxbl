<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MY_Controller {

    public function index() {
        $this->load->model('adminhomepage_model');
        $userLangID=$this->session->userdata('user_language_id');
        $where_SQL = " AND n.language_id=$userLangID ";
        $config['base_url']=site_url('news/index/');
        $config['per_page']=10;
        $config['num_links']=7;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows']=$this->news_model->totalnews($where_SQL);
        $this->pagination->initialize($config);
        $data['news'] = $this->news_model->getnews($where_SQL,$config['per_page'],$page);
        $data['pagetype']='News';
        $sidebar_news_count=$this->config->item('sidebar_news_count');
        $sidebar_promotions_count=$this->config->item('sidebar_promotions_count');
        $data['sidebar_news'] = $this->adminhomepage_model->getnews('',' LIMIT  '.$sidebar_news_count);
        $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('',' LIMIT '.$sidebar_promotions_count,TRUE);
        $pag[0]->title=$this->config->item('project_name').'- News';
        $data['pages'] = $pag;
        $this->load->view('news/index', $data);
    }

    public function full_story($news_id = 0) {
        $this->load->model('adminhomepage_model');
        $userLangID=$this->session->userdata('user_language_id');
        $news = '';
        if(empty($news_id) || !is_numeric($news_id)){
            redirect('news');
        }
        if ($news_id > 0) {
            $where_id = " and n.id=$news_id AND n.language_id=$userLangID ";
            $news = $this->news_model->viewnews($where_id);
        }
        $news[0]->title=$this->config->item('project_name').'- News Full Story';
        $data['sidebar_news'] = $this->adminhomepage_model->getnews('',' LIMIT 5 ');
        $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('',' LIMIT 5 ',TRUE);
        $data['news']=$news;
        $data['pagetype']=($news[0]->is_promotion=='1')?'Promotions':'News';
        $data['pages'] = $data['news'];
        $this->load->view('news/full_story', $data);
    }
    
    public function promotions() {
        $this->load->model('adminhomepage_model');
        $userLangID=$this->session->userdata('user_language_id');
        $where_SQL = " AND n.language_id=$userLangID ";
        $config['base_url']=site_url('news/promotions/');
        $config['per_page']=10;
        $config['num_links']=7;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows']=$this->news_model->totalnews($where_SQL,TRUE);
        $this->pagination->initialize($config);
        $data['news'] = $this->news_model->getnews($where_SQL,$config['per_page'],$page,TRUE);
        $data['pagetype']='Promotions';
        $sidebar_news_count=$this->config->item('sidebar_news_count');
        $sidebar_promotions_count=$this->config->item('sidebar_promotions_count');
        $data['sidebar_news'] = $this->adminhomepage_model->getnews('',' LIMIT  '.$sidebar_news_count);
        $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('',' LIMIT '.$sidebar_promotions_count,TRUE);
        
        $this->load->view('news/index', $data);
    }
    
    public function test()
    {
        $this->load->model('adminhomepage_model');
        $userLangID=$this->session->userdata('user_language_id');
        $where_SQL = " AND n.language_id=$userLangID ";
        $config['base_url']=site_url('news/test/');
        $config['per_page']=10;
        $config['num_links']=7;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows']=$this->news_model->totalnews($where_SQL);;
        $this->pagination->initialize($config);
        
        
        $data['news'] = $this->news_model->getnews($where_SQL,$config['per_page'],$page);
        
        $sidebar_news_count=$this->config->item('sidebar_news_count');
        $sidebar_promotions_count=$this->config->item('sidebar_promotions_count');
        $data['sidebar_news'] = $this->adminhomepage_model->getnews('',' LIMIT  '.$sidebar_news_count);
        $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('',' LIMIT '.$sidebar_promotions_count,TRUE);

        $this->load->view('news/news', $data);
    }

}

?>