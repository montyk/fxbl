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
class Ticket_model extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('ticket',true);
    }

    function save_ticket($post)
    {
          $query  = 'INSERT INTO `fr_ticket` (`dept_id`,`sla_id`,`priority_id`,`topic_id`,`staff_id`,`team_id`,`email`,`name`,'
                  . '`subject`,`ip_address`,`status`,`source`) VALUES '
                  . '("1","1","2","1","0","0","'.$post["email"].'","'.$post["name"].'","'.$post["subject"].'","'.$post["ip_address"].'","open","web")';
          $result = $this->db2->query($query);
          return $this->db2->insert_id();
          //return $this->db2->result();
    }
    
    function update_ticket($post)
    {
        $query  ='UPDATE `fr_ticket` SET ticketID = "'.$post["ticketid"].'" WHERE ticket_id= "'.$post["ticketid"].'"';
         $result = $this->db2->query($query);
    }
    
    function ticketEventCreated($post)
    {
          $query  = 'INSERT INTO `fr_ticket_event` (`ticket_id`,`staff_id`,`team_id`,`dept_id`,`topic_id`,`state`,`staff`)  VALUES '
                  . '("'.$post["ticketid"].'","0","0","1","1","created","SYSTEM")';
          $result = $this->db2->query($query);
          //return $this->db2->result();
    }
    
    function saveTicketThread($post)
    {
          $query  = 'INSERT INTO `fr_ticket_thread` (`pid`,`ticket_id`,`staff_id`,`thread_type`,`title`,`body`,`ip_address`)  VALUES '
                  . '("0",'.$post["ticketid"].',"0","M","'.$post["subject"].'","'.$post["message"].'","'.$post["ip_address"].'")';
          $result = $this->db2->query($query);
          //return $this->db2->result();
    }
    
    


}