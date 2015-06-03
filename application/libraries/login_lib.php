<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author ENTERPI
 */
class login_lib {
    //put your code here
    private $id;
    private $name;
    private $email;
    private $company;
    private $ip_address;
    private $status;
    private $date_added;
    private $last_modified;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getIp_address()
    {
        return $this->ip_address;
    }

    public function setIp_address($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getDate_added()
    {
        return $this->date_added;
    }

    public function setDate_added($date_added)
    {
        $this->date_added = $date_added;
    }

    public function getLast_modified()
    {
        return $this->last_modified;
    }

    public function setLast_modified($last_modified)
    {
        $this->last_modified = $last_modified;
    }


}
?>
