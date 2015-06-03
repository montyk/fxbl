<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('userpages_model');     
        $user_details = unserialize($this->session->userdata['user_details']);
        $this->userpages_model->fx_user_details($user_details->login);
    }

    public function index() 
    {
        //echo '<pre>';
        //print_r($_GET);
        //print_r($_REQUEST);
        
        $post['message']='payment index';
        $data=$this->payment_log_model->save_log($post);
      $response = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $response .= '<result>'."\n";
        $response .= '<code>YES</code>'."\n";
        $response .= '</result>';
        echo $response;
        
        
       /* $response ='<?xml version="1.0" encoding="UTF-8"?>';
        $response .='<response>';
        $response .='<status>0</status>';
        $response .='<iframeUrl>https://www.onlinedengi.ru/pay/bank_cards.php</iframeUrl>';
        $response .='<paymentId>20266404</paymentId>';
        $response .='<amountOriginal>10</amountOriginal>';
        $response .='<currency>RUB</currency>';
        $response .='<lang></lang>';
        $response .='<hash>71e869e90a6284075cf49cef6c232f5c</hash>';
        $response .='</response>';*/
        
    }
    
    public function secret()
    {
       // echo '<pre>';
       // print_r($_GET);
       // print_r($_REQUEST);  
         $post['message']='payment index';
        $data=$this->payment_log_model->save_log($post);
        
         $response = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $response .= '<result>'."\n";
        $response .= '<code>YES</code>'."\n";
        $response .= '</result>';
        echo $response;
    }
    
    public function checkid()
    {
     // $result = $this->users_model->is_user($userid);
     // echo $result;
     
        $post['message']='payment check';
        $data=$this->payment_log_model->save_log($post);
        
        $response = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $response .= '<result>'."\n";
        $response .= '<code>YES</code>'."\n";
        $response .= '</result>';
        //die($response);
        echo $response;
		
		
		
			/*$vars = array(
	'project' => 189,
	'nickname' => '23497434',
	'order_id' => '123456',
	'amount' => 100,
	'mode_type' => 263,
	'xml' => 1
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.onlinedengi.ru/wmpaycheck.php');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$res = curl_exec($ch);

	$xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

	if(intval($xml->status) == 0){
	$url = trim($xml->iframeUrl).'?'
			.'payment_id='.trim($xml->paymentId)
			.'&amount_original='.trim($xml->amountOriginal)
			.'&currency='.trim($xml->currency)
			.'&lang='.trim($xml->lang)
			.'&hash='.trim($xml->hash);
	?>
	<iframe name="onmoney" src="<?php echo $url; ?>" width="530" height="925"
	frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>
	<?php
	}
	else{
	echo $xml->comment;
	}

        
        //return TRUE;*/
    }

    public function success()
    {
       // echo '<pre>';
        //print_r($_GET);
       // print_r($_REQUEST);   
        
         $post['message']='payment success';
        $data=$this->payment_log_model->save_log($post);
        
         
        $response ='<?xml version="1.0" encoding="UTF-8"?>';
        $response .='<response>';
        $response .='<status>0</status>';
        $response .='<iframeUrl>https://www.onlinedengi.ru/pay/bank_cards.php</iframeUrl>';
        $response .='<paymentId>20266404</paymentId>';
        $response .='<amountOriginal>10</amountOriginal>';
        $response .='<currency>RUB</currency>';
        $response .='<lang></lang>';
        $response .='<hash>71e869e90a6284075cf49cef6c232f5c</hash>';
        $response .='</response>';
        echo $response;
            }

    public function error()
    {
       // echo '<pre>';
        //print_r($_GET);
       // print_r($_REQUEST);   
        
         $post['message']='payment error';
        $data=$this->payment_log_model->save_log($post);
        $response ='<?xml version="1.0" encoding="UTF-8"?>';
        $response .='<response>';
        $response .='<status>0</status>';
        $response .='<iframeUrl>https://www.onlinedengi.ru/pay/bank_cards.php</iframeUrl>';
        $response .='<paymentId>20266404</paymentId>';
        $response .='<amountOriginal>10</amountOriginal>';
        $response .='<currency>RUB</currency>';
        $response .='<lang></lang>';
        $response .='<hash>71e869e90a6284075cf49cef6c232f5c</hash>';
        $response .='</response>';
        echo $response;
    }

    
    
    
    

}