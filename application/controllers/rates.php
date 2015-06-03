<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rates extends MY_Controller {

    var $payment_methods = array();
	var $ecurrencies = array();
	function __construct() {
        parent::__construct();
		$this->payment_methods = $this->common_model->getTableDetails('id,name','payment_methods','status=1');
		$this->ecurrencies = $this->common_model->getTableDetails('id,name','ecurrencies','status=1');
    }
	public function index() {
		$data['payment_methods'] = $this->payment_methods;
		$data['ecurrencies'] = $this->ecurrencies;
		$this->load->view('rates/index',$data);
    }
	public function getrates()
	{
		//echo '<pre>';print_r($_POST);die;
		$rates_info=$this->rates_model->getrates($_POST);
		
		//echo '<pre>';print_r($rates_info);die;
		$html = '';
		if($rates_info)
		{
			$pm_name = $rates_info[0]->pm_name;
			$ec_name = $rates_info[0]->ec_name;
			$action_type = $rates_info[0]->action_type;

			$html .= '<div id="content">
				<br/>
				<div class="h_1">
				Currency Percentages
				</div>
				<div id="contact_form_wrap" class="pad6">
				<pre></pre>
				<br/>';
			$html .='<div class="h_2">'. $action_type .' '.$ec_name.' From Edealspot.com from '.$pm_name.'</div>
					<table align="center" cellpadding="6" cellspacing="2" class="customtable">
					<tbody>
					
					<tr class="trhead">
					<td height="37"><span class="style1"><strong>From &nbsp;</strong></span></td>
					<td><span class="style1"><strong>To &nbsp;</strong></span></td>
					<td><span class="style1"><strong>Fees &nbsp; </strong></span></td>
					</tr>';
				foreach($rates_info as $key=>$value)
				{
					$from = $value->from;
					$to = $value->to;
					$fee = $value->amount.' '.$value->fee_type;
					if(($value->to == '') || ($value->to == '0.00'))
						$to = 'More than';
				$html .='<tr bgcolor="#EEEEEE">
					<td class="pad8 ">'.$from.'</td>
					<td class="pad8 ">'.$to.'</td>
					<td  class="pad8 " >'.$fee.'</td>
					</tr>';
				} 	
					
				$html .='</tbody>
					</table>
				<br/>
				</div>
			</div>';
			
		}
		else
		{
			$html .='<div id="content">
				<div class="h_1">
				Currency Percentages
				</div>
				<div id="contact_form_wrap" class="pad6">
				<pre></pre>
				<br/>
					<div class="h_2">No Data Available</div>
				<br/>
				</div>
			</div>';
		}
		echo $html;
	}
}

?>