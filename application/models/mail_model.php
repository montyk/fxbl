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
class Mail_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
    }

    function send_mail($post) {
        $from = $post['from']; ///$this->config->item('from_mail');;
        $to = $post['to'];
        $subject = $post['subject'];

        $bcc = isset($post['bcc']) ? $post['bcc'] : '';

        $content = ((!empty($post['content'])) ? $post['content'] : ((!empty($post['message'])) ? $post['message'] : ''));

        $ip_array = array(
            'from' => $from,
            'to' => $to,
            'subject' => $subject,
            'message' => $content,
            'bcc' => $bcc
        );
        //print_r($ip_array);	 die;		
//        $mail_res = $this->sendMail($ip_array);
        $mail_res = $this->sendNormalMail($ip_array);
        return $mail_res;
    }

    function sendMail($ip_array = array()) {
        $smtp_acc = array();

        $smtp_acc['gmail']['protocol'] = 'smtp';
        $smtp_acc['gmail']['smtp_host'] = 'ssl://smtp.gmail.com';
        $smtp_acc['gmail']['smtp_port'] = '465';
        $smtp_acc['gmail']['smtp_timeout'] = '7';
        $smtp_acc['gmail']['smtp_user'] = 'forexray100@gmail.com';
        $smtp_acc['gmail']['smtp_pass'] = 'FxRay100';
        $smtp_acc['gmail']['charset'] = 'utf-8';
        $smtp_acc['gmail']['newline'] = "\r\n";
        $smtp_acc['gmail']['mailtype'] = 'html'; // or html
        $smtp_acc['gmail']['validation'] = TRUE; // bool whether to validate email or not  

        $smtp_acc['forexray']['protocol'] = 'smtp';
        $smtp_acc['forexray']['smtp_host'] = 'smtp.mandrillapp.com';
        $smtp_acc['forexray']['smtp_port'] = '587';
        $smtp_acc['forexray']['smtp_timeout'] = '7';
        $smtp_acc['forexray']['smtp_user'] = 'accounts@forexray.com';
        $smtp_acc['forexray']['smtp_pass'] = 'aMPHLHeitCybUM-TINMvkQ';
        $smtp_acc['forexray']['charset'] = 'utf-8';
        $smtp_acc['forexray']['newline'] = "\r\n";
        $smtp_acc['forexray']['mailtype'] = 'html'; // or html
        $smtp_acc['forexray']['validation'] = TRUE; // bool whether to validate email or not 

        $config = $smtp_acc['forexray'];

        $this->email->initialize($config);

        $from = (isset($ip_array['from']) ? $ip_array['from'] : '');
        $to = (isset($ip_array['to']) ? $ip_array['to'] : '');
        $subject = (isset($ip_array['subject']) ? $ip_array['subject'] : '');
        $message = (isset($ip_array['message']) ? $ip_array['message'] : '');
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->mailtype = "html";
        $res = $this->email->send();
        return $res;
    }

    function sendNormalMail($ip_array = array()) {

        $this->email->clear();

        // $config['protocol'] = 'sendmail';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $from = (isset($ip_array['from']) ? $ip_array['from'] : $this->config->item('from_mail'));
        $to = (isset($ip_array['to']) ? $ip_array['to'] : '');
        $subject = (isset($ip_array['subject']) ? $ip_array['subject'] : '');
        $message = (isset($ip_array['message']) ? $ip_array['message'] : '');
        $bcc = (isset($ip_array['bcc']) ? $ip_array['bcc'] : '');


        $this->email->from($from);
        $this->email->to($to);
        if (!empty($bcc))
            $this->email->bcc($bcc);

        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->mailtype = "html";
        $res = $this->email->send();
        // echo $this->email->print_debugger();
        return $res;
    }

    function contactus_details($id = 0) {
        $sql = "select * from contactus where id='" . $id . "'";
        return $this->getDBResult($sql, 'object');
    }

}