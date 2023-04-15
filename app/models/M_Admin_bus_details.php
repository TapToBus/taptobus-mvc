<?php

class M_Admin_bus_details {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getbuses(){

        $this->db->query('SELECT * FROM bus WHERE status = "active"');

        return $this->db->resultSet();

    }
}
?>