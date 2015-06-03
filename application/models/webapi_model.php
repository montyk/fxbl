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
class Webapi_model extends MY_Model {
//put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function account_user_id($user_id) {
        $sql = "select u.firstname as name,
                    u.id as id,
                    u.login as login,
                    u.email as email,
                    u.state as state,
                    u.city as city,
                    u.address as address,
                    concat(u.isd_code,u.phone) as phone,
                    u.phone_password as password_phone,
                    u.zip as zipcode,
                    c.name as `country`
		  from  users as u
                    left join countries as c on c.id=u.country_id                    
                    where u.id=" . $user_id;
        return $this->getDBResult($sql, 'array');
    }
    
    function getUser($user_id) {
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
                    u.phone_password as password_phone,
                    u.zip as zipcode,
                    u.send_reports as send_reports,
                    u.registration_type as type,
                    g.name as `group`,
                    l.name as `leverage`,
                    c.name as `country`, 
                    if(registration_type='demo',d.name,0) as deposit,
                    '' as password_investor,
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




	
}