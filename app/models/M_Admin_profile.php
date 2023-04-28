<?php

class M_admin_profile{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAdminProfileDetails($admin_nic){
        $this->db->query('SELECT admin_id, nic, fname, lname, email, mobileNo, TelNo');
    }
}
?>