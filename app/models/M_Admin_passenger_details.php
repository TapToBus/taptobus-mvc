<?php

class M_Admin_passenger_details{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getpassengers(){
        $this->db->query('SELECT * FROM passenger WHERE status = "active"');

        return $this->db->resultSet();
    }
}

?>