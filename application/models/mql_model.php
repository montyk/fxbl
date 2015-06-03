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
class Mql_model extends MY_Model {

//put your code here
    var $MQ_CLEAR_STARTTIME = 0;
    var $MQ_CLEAR_NUMBER = 0;

    public function __construct() {
        parent::__construct();
    }

    function MQ_Query_Register($query,$type='real') {
        $ret = 'error';
        
        if($type=='real'){ 
            $ptr = fsockopen(T_MT4_HOST, T_MT4_PORT, $errno, $errstr, 5); 
        }
        else{  
            $ptr = fsockopen(DEMO_T_MT4_HOST, DEMO_T_MT4_PORT, $errno, $errstr, 5);
            }
       // $ptr = fsockopen(T_MT4_HOST, T_MT4_PORT, $errno, $errstr, 5);
        if ($ptr) {
            // echo 1;
            if (fputs($ptr, "W$query\nQUIT\n") != FALSE) {
                $ret = '';
                while (!feof($ptr)) {
                    $line = fgets($ptr, 128);
                    if ($line == "end\r\n")
                        break;
                    $ret.= $line;
                }
            }
            fclose($ptr);
        }
        return $ret;
    }

    function Check_Mql_Response($ret) {
        $error = true;
        $response = '';
        $ret = explode("\r\n", $ret);
        //--- it is error?
        if (empty($ret) || empty($ret[0]) || $ret[0] == 'error' || $ret[0] == 'ERROR') {
            //--- parse error code
            if (strpos($ret[1], 'blocked') !== false)
                $response = "Sorry! Your IP was blocked. Please wait one minute and try again";
            else
                $response = "Internal Error.. Please Contact Administrator ";
        }
        else {
            $login = explode("=", $ret[1]);
            if (is_array($login))
                $response = $login[1];
            $error = false;
        }

        return array('response' => $response, 'error' => $error);
    }

    function account_user_id($user_id) {
        $sql = "select u.firstname as name,
                    u.id as id,
                    u.email as email,
                    u.password as `password`,
                    u.account_for as account_for,
                    u.state as state,
                    u.city as city,
                    u.address as address,
                    u.phone as phone,
					u.isd_code as isd_code,
                    u.phone_password as phone_password,
                    u.zip as zipcode,
                    u.send_reports as send_reports,
                    u.registration_type as type,
                    g.id as `group`,
                    l.name as `leverage`,
                    c.name as `country`, 
                    if(registration_type='demo',d.name,0) as deposit,
                    '' as investor,
                    '' as `status`,
                    '' as agent,
                    '' as comment
		  from  users as u
                    left join groups as g on g.id=u.group_id
                    left join leverage as l on l.id=u.leverage_id 
                    left join deposits as d on d.id=u.deposit_id
                    left join countries as c on c.id=u.country_id
                     
                    where u.id=" . $user_id;
        return $this->getDBResult($sql, 'array');
    }

    function create_account_mql($user_id) {
        $data = $this->account_user_id($user_id);
		//echo '<pre>';
		//print_r($data);
		//exit();
		//echo $data[0]['group'];
        if ($data) {
			if($data[0]['account_for']=='2')
			{
			$data[0]['deposit']='0';
			$data[0]['investor']=$data[0]['password'];
			$data[0]['password']='FxRay@123';
			}
			if($data[0]['account_for']=='3')
			{
			$data[0]['deposit']='0';
			}
			$data[0]['phone']=$data[0]['isd_code'].$data[0]['phone'];
			//if($data[0]['group']!='8' && $data[0]['group']!='9')
			//{
			//$data[0]['group']='1';
			//}
			//$data[0]['investor']='';
            array_walk_recursive($data[0], 'arrayDestring');
            $user_information = $data[0];

            $ret = $this->CreateAccount($user_information);
            //echo '<pre>';
            //print_r($ret);
            $response = $this->Check_Mql_Response($ret);
            return $response;
        }
    }

    function CreateAccount($user) {
        //--- prepare query
        $plugin_master=($user['type']=='real')?T_PLUGIN_MASTER:DEMO_PLUGIN_MASTER;
        $query = "NEWACCOUNT MASTER=" . $plugin_master . "|IP=$_SERVER[REMOTE_ADDR]|GROUP=$user[group]|NAME=$user[name]|" .
                "PASSWORD=$user[password]|INVESTOR=$user[investor]|EMAIL=$user[email]|COUNTRY=$user[country]|" .
                "STATE=$user[state]|CITY=$user[city]|ADDRESS=$user[address]|COMMENT=$user[comment]|" .
                "PHONE=$user[phone]|PHONE_PASSWORD=$user[phone_password]|STATUS=$user[status]|ZIPCODE=$user[zipcode]|" .
                "ID=$user[id]|LEVERAGE=$user[leverage]|AGENT=$user[agent]|SEND_REPORTS=$user[send_reports]|DEPOSIT=$user[deposit]";
        //--- send request
        //die();
		if($user['type']=='demo'){
		//echo $query;die();
		}
        return($this->MQ_Query_Register($query,$user['type']));
    }

    function MQ_Query_Trade($query, $cacheDir = T_CACHEDIR, $cacheTime = T_CACHETIME, $cacheDirPrefix = '') {
        $ret = '';
        $fName = $cacheDir . $cacheDirPrefix . crc32($query); // cache file name
//--- Is there a cache? Has its time not expired yet?
        if (file_exists($fName) && (time() - filemtime($fName)) < $cacheTime) {
            $ret = file_get_contents($fName);
        } else {
            $ptr = @fsockopen(T_MT4_HOST, T_MT4_PORT, $errno, $errstr, T_TIMEOUT);
            if ($ptr) {
//--- If having connected, request and collect the result
                if (fputs($ptr, "W$query\r\nQUIT\r\n") != FALSE)
                    while (!feof($ptr)) {
                        if (($line = fgets($ptr, 128)) == "end\r\n")
                            break;
                        $ret .= $line;
                    }
                fclose($ptr);
                if ($cacheTime > 0) {
//--- If there is a prefix (login, for example), create a nonpresent directory for storing the cache
                    if ($cacheDirPrefix != '' && !file_exists($cacheDir . $cacheDirPrefix)) {
                        foreach (explode('/', $cacheDirPrefix) as $tmp) {
                            if ($tmp == '' || $tmp[0] == '.')
                                continue;
                            $cacheDir .= $tmp . '/';
                            if (!file_exists($cacheDir))
                                @mkdir($cacheDir);
                        }
                    }
//--- save result into cache
                    $fp = @fopen($fName, 'w');
                    if ($fp) {
                        fputs($fp, $ret);
                        fclose($fp);
                    }
                }
            } else {
//--- if connection fails, show the old cache (if there is one) or return with the error 
                if (file_exists($fName)) {
                    touch($fName);
                    $ret = file_get_contents($fName);
                } else {
                    $ret = '!!!CAN\'T CONNECT!!!';
                }
            }
        }
//--- clear cache every 3 sec (for such frequency of calls)
        if (!file_exists(T_CACHEDIR . '.clearCache') || (time() - filemtime(T_CACHEDIR . '.clearCache')) >= 3) {
            ignore_user_abort(true);
            touch(T_CACHEDIR . '.clearCache');


            $this->MQ_CLEAR_STARTTIME = time();
            $this->MQ_ClearCache(realpath(T_CACHEDIR));

            ignore_user_abort(false);
        }
        return $ret;
    }

    function MQ_ClearCache($dirName) {
        if (empty($dirName) || ($list = glob($dirName . '/*')) === false || empty($list))
            return;
//---

        $size = sizeof($list);
        foreach ($list as $fileName) {
            $baseName = basename($fileName);
            if ($baseName[0] == '.')
                continue;
            if (is_dir($fileName)) {
//--- go through all cache directories recursively
                $this->MQ_ClearCache($fileName);
                if ($this->MQ_CLEAR_NUMBER >= T_CLEAR_DELNUMBER)
                    return; // by recursion check condition for function exit 
            }
            elseif (($this->MQ_CLEAR_STARTTIME - filemtime($fileName)) > T_CACHETIME) {
//--- if the file time is expired, delete it and, if the limit of deleted files has been exceeded, exit
                @unlink($fileName);
                if (++$this->MQ_CLEAR_NUMBER >= T_CLEAR_DELNUMBER)
                    return;
                --$size;
            }
        }
//--- delete empty directory
        $tmp = realpath(T_CACHEDIR);
        if (!empty($tmp) && $size <= 0 && strlen($dirName) > strlen($tmp) && $dirName != $tmp)
            @rmdir($dirName);
    }

    function MQ_Login($login, $password) {
        $login = substr($login, 0, 14);
        $password = substr($password, 0, 16);
//---
        $res = $this->MQ_Query_Trade('WAPUSER-' . $login . '|' . $password, '', 0);
//---

        $response = '';
        if ($res == '!!!CAN\'T CONNECT!!!') {
            $response = "CAN'T CONNECT";
            return $response;
        }
//---
        if (strpos($res, 'Invalid') !== false || strpos($res, 'Disabled') !== false) {
            ///////// MQ_Logout('','',1,0);
            $response = (strpos($res, 'Invalid') !== false ? 'Invalid' : 'Disabled');
            $response.=" Login";
            return $response;
        } else {
            $response = "Success";
            return $response;
            // MQ_Logout($login,$password,0,1,'trade.php');
        }
    }

    function MQ_Get_Open_Positions($login, $password,$from=0,$to=0) {
        $login = substr($login, 0, 14);
        $password = substr($password, 0, 16);
//---
        // $mqQuery='USERINFO-login=' . $login . '|password=' . $password .'|from='. strtotime('2013-07-14 00:00:00') .'|to='. strtotime('2013-07-16 00:00:00');
        
        $mqQuery='USERINFO-login=' . $login . '|password=' . $password ;
        if(!empty($from) && !empty($to)){
            $mqQuery.='|from='. strtotime($from.' 00:00:00') .'|to='. strtotime($to.' 23:59:59');
            // echo $mqQuery.='|from='. time() .'|to='. time();
        }
        $res = $this->MQ_Query_Trade($mqQuery
                , T_CACHEDIR
                , T_CACHETIME
                , $login . '/');
//        echo '<br/><pre>'; print_r($res); echo '</pre>';
//---

        $response = '';
        if ($res == '!!!CAN\'T CONNECT!!!') {
            $response = "CAN'T CONNECT";
            return array('response' => $response, 'error' => true);
        }
//---
        if (strpos($res, 'Invalid') !== false || strpos($res, 'Disabled') !== false) {
            ///////// MQ_Logout('','',1,0);
            $response = (strpos($res, 'Invalid') !== false ? 'Invalid' : 'Disabled');
            $response.=" Login";
            return array('response' => $response, 'error' => true);
        } else {
            $response = "Success";
            return array('response' => $res, 'error' => false);
            // MQ_Logout($login,$password,0,1,'trade.php');
        }
    }
    
    function MQ_Get_Trading_History($login, $password,$from=0,$to=0) {
        $login = substr($login, 0, 14);
        $password = substr($password, 0, 16);
//---
        // $mqQuery='USERINFO-login=' . $login . '|password=' . $password .'|from='. strtotime('2013-07-14 00:00:00') .'|to='. strtotime('2013-07-16 00:00:00');
        
        $mqQuery='USERHISTORY-login=' . $login . '|password=' . $password ;
        if(!empty($from) && !empty($to)){
            $mqQuery.='|from='. strtotime($from.' 00:00:00') .'|to='. strtotime($to.' 23:59:59');
            // echo $mqQuery.='|from='. time() .'|to='. time();
        }else{
            $time    =mktime(23,59,59,date('n'),date('j'),date('Y'));
            $mqQuery.='|from='. ($time-2592000) .'|to='. $time;
        }
        $res = $this->MQ_Query_Trade($mqQuery
                , T_CACHEDIR
                , T_CACHETIME
                , $login . '/');
//        echo '<br/><pre>'; print_r($res); echo '</pre>';
//---

        $response = '';
        if ($res == '!!!CAN\'T CONNECT!!!') {
            $response = "CAN'T CONNECT";
            return array('response' => $response, 'error' => true);
        }
//---
        if (strpos($res, 'Invalid') !== false || strpos($res, 'Disabled') !== false) {
            ///////// MQ_Logout('','',1,0);
            $response = (strpos($res, 'Invalid') !== false ? 'Invalid' : 'Disabled');
            $response.=" Login";
            return array('response' => $response, 'error' => true);
        } else {
            $response = "Success";
            return array('response' => $res, 'error' => false);
            // MQ_Logout($login,$password,0,1,'trade.php');
        }
    }

    function MQ_Login_Account($login, $password,$from=0,$to=0) {
        $login = substr($login, 0, 14);
        $password = substr($password, 0, 16);
//---
        // $mqQuery='USERINFO-login=' . $login . '|password=' . $password .'|from='. strtotime('2013-07-14 00:00:00') .'|to='. strtotime('2013-07-16 00:00:00');
        
        $mqQuery='USERINFO-login=' . $login . '|password=' . $password ;
        if(!empty($from) && !empty($to)){
            $mqQuery.='|from='. strtotime($from.' 00:00:00') .'|to='. strtotime($to.' 23:59:59');
            // echo $mqQuery.='|from='. time() .'|to='. time();
        }else{
            $time    =mktime(23,59,59,date('n'),date('j'),date('Y'));
            $mqQuery.='|from='. ($time-2592000) .'|to='. $time;
        }
        $res = $this->MQ_Query_Trade($mqQuery
                , T_CACHEDIR
                , T_CACHETIME
                , $login . '/');
//        echo '<br/><pre>'; print_r($res); echo '</pre>';
//---

        $response = '';
        if ($res == '!!!CAN\'T CONNECT!!!') {
            $response = "CAN'T CONNECT";
            return array('response' => $response, 'error' => true);
        }
//---
        if (strpos($res, 'Invalid') !== false || strpos($res, 'Disabled') !== false) {
            ///////// MQ_Logout('','',1,0);
            $response = (strpos($res, 'Invalid') !== false ? 'Invalid' : 'Disabled');
            $response.=" Login";
            return array('response' => $response, 'error' => true);
        } else {
            $response = "Success";
            return array('response' => $res, 'error' => false);
            // MQ_Logout($login,$password,0,1,'trade.php');
        }
    }

    function MQ_History($login, $password) {
        $login = substr($login, 0, 14);
        $password = substr($password, 0, 16);
//---
        $time = mktime(23, 59, 59, date('n'), date('j'), date('Y'));

        $res = $this->MQ_Query_Trade('USERHISTORY-login=' . $login . '|password=' . $password . '|from=' . ($time - 2592000) . '|to=' . $time
                , T_CACHEDIR
                , T_CACHETIME
                , $login . '/');
//---

        $response = '';
        if ($res == '!!!CAN\'T CONNECT!!!') {
            $response = "CAN'T CONNECT";
            return array('response' => $response, 'error' => true);
        }
//---
        if (strpos($res, 'Invalid') !== false || strpos($res, 'Disabled') !== false) {
            ///////// MQ_Logout('','',1,0);
            $response = (strpos($res, 'Invalid') !== false ? 'Invalid' : 'Disabled');
            $response.=" Login";
            return array('response' => $response, 'error' => true);
        } else {
            $response = "Success";
            return array('response' => $res, 'error' => false);
            // MQ_Logout($login,$password,0,1,'trade.php');
        }
    }

    function MQ_GetParam($line) {
        $value='0';
        if(isset($line)){
            list($tmp, $value) = explode(' ', $line);
            return $value;
        }else{
            return '0';
        }
            
        
    }

}