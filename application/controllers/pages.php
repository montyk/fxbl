<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function pageview($url_key = '', $language_id = 1) {

        if (trim($url_key) != '') {
            $this->load->model('adminhomepage_model');
            
            $data=$this->adminwidget_model->get_widgets_template();
            
            $pageDetails = $this->pages_model->getpagedet_atta(trim($url_key),$language_id);

            if(!empty($pageDetails) && stripos($pageDetails[0]->content, '{EMBEDPAGE')>0){
                $matches = array();
                $regex = "/{EMBEDPAGE(.*)}/";
                preg_match_all($regex, $pageDetails[0]->content, $matches);
                if(!empty($matches[1])){
                    foreach ($matches[1] as $key => $value) {
                        $embed_url_key=substr($value, 1);
                        $embedPage  = '';
                        $embedPageDetails = $this->pages_model->getpagedet_atta(trim($embed_url_key), $language_id);
                        if (!empty($embedPageDetails))
                            $embedPage = $embedPageDetails[0]->content;
                        $pageDetails[0]->content=str_replace($matches[0][$key], $embedPage, $pageDetails[0]->content);
                    }
                }
            }
            
            $data['pages'] = $pageDetails;
            
            if (!empty($data['pages'][0]->id)) {
                $data['page_menu'] = $this->adminmenus_model->get_page_menus($data['pages'][0]->id,$language_id);
            }
            // echo '<pre>'; print_r($data['page_menu']); echo '</pre>';
            // $this->load->view('pages/index', $data);  // ADDING WIDGET PARSING ABOVE
//            $sidebar_news_count=$this->config->item('sidebar_news_count');
//            $sidebar_promotions_count=$this->config->item('sidebar_promotions_count');
//            $data['sidebar_news'] = $this->adminhomepage_model->getnews('',' LIMIT  '.$sidebar_news_count);
//            $data['sidebar_promotions'] = $this->adminhomepage_model->getnews('',' LIMIT '.$sidebar_promotions_count,TRUE);
            
            
            $this->parser->parse('pages/index', $data);
            
        } else {
            redirect('home');
        }
    }

}

?>