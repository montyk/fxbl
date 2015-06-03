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
class Payment_model extends MY_Model { 
//put your code here
    public function __construct() {
        parent::__construct();
    }
	function payment_view($id=0)
    {
        $ref_id = $this->common_model->getReferenceID('payments');
		$sql = 'SELECT pm.*,a.url,a.original_file_name,a.db_file_name,a.id as att_id FROM payment_methods pm
				LEFT JOIN attachments a on a.global_id = pm.id and a.reference_id = '.$ref_id.'
				where pm.id='.$id;
        return $this->getDBResult($sql, 'object');
    }
    function save_pm($post=array(),$files=array())
	{
		if($post['id'])
        {
            $post['pm_id'] = $pm_id = $this->saveRecord(conversion($post,'payment_methods_lib'),'payment_methods',array('id'=>$post['id']));
        }
        else
        {
            $post['pm_id'] = $pm_id = $this->saveRecord(conversion($post,'payment_methods_lib'),'payment_methods');
        }
		if(isset($post['original_file_name']) && !empty($post['original_file_name']) && $post['pm_id'] !=0)
        {
            $ref_id = $this->common_model->getReferenceID('payments');
			if($post['id']!=0)
			{
				$pm_id =  $post['id'];
				$this->common_model->delete_attachments($post['id'],$ref_id);
			}
			$db_file_name = $post['db_file_name'];
			$original_file_name = $post['original_file_name'];
			$url = 'uploads/'.$post['db_file_name'];
			$global_id = $pm_id;
			$reference_id = $ref_id;
			$_POST['attachments_id'] = $this->fileupload_model->save_attachment($db_file_name,$original_file_name,$global_id,$reference_id);
        }
		
		return $post['pm_id'];	
			
    }
	
	function getpaymentdata()
	{
		$ref_id = $this->common_model->getReferenceID('payments');
		$sql = 'SELECT pm.id,pm.name,pm.account_name,
				CASE WHEN att.db_file_name <> "" THEN att.db_file_name ELSE "noimage.jpg" END as logo_image
				FROM payment_methods pm
				LEFT JOIN attachments att ON att.global_id = pm.id and att.reference_id='.$ref_id;    
        $data_flds = array('name',"<img  src='".site_url()."uploads/{%logo_image%}' width=30 height=30>",'account_name',"<a class='btn edit_ecur' href='".site_url()."adminpayment/payment_view/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
		return $this->users_model->display_grid($_POST,$sql,$data_flds);
	}
	
}