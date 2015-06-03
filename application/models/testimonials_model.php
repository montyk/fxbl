<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author RAJU
 */
class Testimonials_model extends MY_Model {  
//put your code here
    public function __construct() {
        parent::__construct();
    }
    function save_tm($post)
	{
		if($post['id'])
        {
            return $this->saveRecord(conversion($post,'testimonials_lib'),'testimonials',array('id'=>$post['id']));
        }
        else
        {
            return $this->saveRecord(conversion($post,'testimonials_lib'),'testimonials');
        }	
			
    }
	function testimonial_view($id=0)
    {
        $sql = 'SELECT t.id,concat(u.firstname," ",u.lastname," ","(",u.email,")") as name,t.message,t.status 
				FROM testimonials t
				left join users u on u.id = t.users_id
				where t.id='.$id;
        return $this->getDBResult($sql, 'object');
    }
	function getTMdata()
	{
		$sql = 'SELECT t.id,concat(u.firstname," ",u.lastname) as name,t.message,
				CASE WHEN t.status =1 THEN "Publish" ELSE "Unpublish" END as status 
				FROM testimonials t
				left join users u on u.id = t.users_id';    
        $data_flds = array('name','message','status',"<a class='btn edit_ecur ' href='".site_url()."admintestimonials/testimonial_view/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>","<a class='btn edit_ecur jdelete_tm' id='{%id%}'><span class='inner-btn'><span class='label'>Delete</span></span></a>");
		return $this->users_model->display_grid($_POST,$sql,$data_flds);
	}
	
	function getTMrecords($limit='')
	{
		 $sql = 'SELECT t.id,concat(u.firstname," ",u.lastname) as name,t.message
				FROM testimonials t
				left join users u on u.id = t.users_id where t.status = 1 order by t.last_modified desc '.$limit;   
       $data = $this->getDBResult($sql, 'object');
	   return $data;
	}
}