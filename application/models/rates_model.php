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
class Rates_model extends MY_Model {  
//put your code here
    public function __construct() {
        parent::__construct();
    }
	function rates_view($id=0)
    {
        $sql = 'SELECT * FROM rates where id='.$id;
        return $this->getDBResult($sql, 'object');
    }
    function save_rates($post)
	{
		if(isset($post['above']))
		{
			$post['to']=0;
		}
		if($post['id'])
        {
            return $this->saveRecord(conversion($post,'rates_lib'),'rates',array('id'=>$post['id']));
        }
        else
        {
            return $this->saveRecord(conversion($post,'rates_lib'),'rates');
        }	
			
    }
	function getratesdata()
	{
		$search_qry = '';
		if(isset($_POST['payment_method']) && $_POST['payment_method']!='')
		{
			$search_qry .= ' AND r.paymentg_methods_id = '.$_POST['payment_method'];
		}
		if(isset($_POST['ecurrencies']) && $_POST['ecurrencies']!='')
		{
			$search_qry .= ' AND r.ecurrencies_id = '.$_POST['ecurrencies'];
		}
        $sql = 'select r.id,r.from,r.to,r.amount,pm.name as pm_name,ec.name as ec_name from rates r
				left join ecurrencies ec on r.ecurrencies_id = ec.id
				left join payment_methods pm on r.paymentg_methods_id = pm.id where 1 '.$search_qry;    
        $data_flds = array('from','to','amount','pm_name','ec_name',"<a class='btn edit_ecur' href='".site_url()."adminrates/rates_view/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
		return $this->users_model->display_grid($_POST,$sql,$data_flds);
	}
	
	function getrates($post=array())
	{
       $sql = 'select r.id,r.from,r.to,r.amount,pm.name as pm_name,ec.name as ec_name,
				CASE WHEN r.type = 1 THEN "BUY" ELSE "SELL" END as action_type,
				CASE WHEN r.fee_type = 1 THEN "Flat Fee" ELSE "%" END as fee_type 
				from rates r
				left join ecurrencies ec on r.ecurrencies_id = ec.id
				left join payment_methods pm on r.paymentg_methods_id = pm.id 
				where r.paymentg_methods_id='.$post['paymentg_methods_id'].' AND 
				r.ecurrencies_id='.$post['ecurrencies_id'].' AND r.type='.$post['type'].' AND r.status=1 order by r.from asc';    
		$data = $this->getDBResult($sql, 'object');
		return $data;
	}
	
}