<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Createaccountform extends MY_Controller {

    public function index() {
        $mt4request = new CMT4DataReciver;
        //$mt4request->SetSafetyData($secretHash, $encryptionKey); // you can turn on encryption and hash by uncommenting this line. (you need to turn it on on the server too)
        $mt4request->OpenConnection(SERVER_ADDRESS, SERVER_PORT);
                echo '---------------Get Symbols-----------------------<br/>';
        $answerData = $mt4request->MakeRequest("getsymbols");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>---------------Server Time-----------------------<br/><br/>';
        $answerData = $mt4request->MakeRequest("servertime");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>---------------Get version-----------------------<br/><br/>';
        $answerData = $mt4request->MakeRequest("getversion");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>---------------requesting complete information about specific group.-----------------------<br/><br/>';
        $params['group']='demoforex';
        $answerData = $mt4request->MakeRequest("getgroup",$params);
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- information about all existing groups -----------------------<br/><br/>';
        $answerData = $mt4request->MakeRequest("getgroups");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- receiving balance of the specific account -----------------------<br/><br/>';
        $params['login'] = "101081";
        $answerData = $mt4request->MakeRequest("getaccountbalance",$params);
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- request information about any trades  on client`s account -----------------------<br/><br/>';
        $params['login'] = "101081";
        $answerData = $mt4request->MakeRequest("accounthavetrades",$params);
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- complete information about a specific account -----------------------<br/><br/>';
        $params['login'] = "101081";
        $answerData = $mt4request->MakeRequest("getaccountinfo",$params);
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- all accounts` balances -----------------------<br/><br/>';
        $params['login'] = "101081";
        $answerData = $mt4request->MakeRequest("getallbalances");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- allows trader to check his password -----------------------<br/><br/>';
        $params['login'] = "101081";
        $params['pass'] = "Qwerty2123456";
        $answerData = $mt4request->MakeRequest("checkpassword",$params);
        echo '<pre>';
        print_r($answerData);
        

        echo '<br/><br/><br/>--------------- to change his main or investor`s password.-----------------------<br/><br/>';
        $params['login'] = "101081";
        $params['pass'] = "Qwerty2123456";
        $params['investor'] = "0";
        $answerData = $mt4request->MakeRequest("changepassword",$params);
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- requesting the name of a specific group of account and his  leverage.-----------------------<br/><br/>';
        $answerData = $mt4request->MakeRequest("getleverageandgroup");
        echo '<pre>';
        print_r($answerData);
        
        echo '<br/><br/><br/>--------------- requesting/receiving information about Margin level, balance, equity, separately by users.here balance=balance+credit-----------------------<br/><br/>';
        $params['login'] = "101122";
        $answerData = $mt4request->MakeRequest("getmargininfo",$params);
        echo '<pre>';
        print_r($answerData);
        echo $answerData['freeMargin'];
		
        echo '<br/><br/><br/>--------------- requesting/receiving information about Margin level, balance, equity, separately by users.-----------------------<br/><br/>';
        $params['login'] = "101122";
        $answerData = $mt4request->MakeRequest("getmargininfoex",$params);
        echo '<pre>';
        print_r($answerData);
        echo $answerData['freeMargin'];
		
        echo '<br/><br/><br/>--------------- requesting/receiving information about Margin level, balance, equity, separately by users.-----------------------<br/><br/>';
        $params['login'] = "101122";
		$startTS = $k->date_added; //echo '</br>';
		$endTS = date('Y-m-d H:i:s'); 
		$params['from'] = strtotime($startTS);
		$params['to'] = strtotime($endTS);
		$answerData2 = $mt4request->MakeRequest("gethistory", $params);        echo '<pre>';
        print_r($answerData2);
        echo $answerData['freeMargin'];
		
		

        
        
        
    }

}

?>