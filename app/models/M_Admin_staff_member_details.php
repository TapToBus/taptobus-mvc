<?php

class M_Admin_staff_member_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getstaffmembers(){
        $this->db->query('SELECT * FROM staffmember');

        return $this->db->resultSet();
    }
}
?>