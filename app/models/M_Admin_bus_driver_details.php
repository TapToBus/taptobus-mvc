<?php

class M_Admin_bus_driver_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getdrivers(){
        $this->db->query('SELECT * FROM driver');

        return $this->db->resultSet();
    }
}

?>