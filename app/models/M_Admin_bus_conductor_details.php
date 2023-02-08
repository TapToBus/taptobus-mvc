<?php

class M_Admin_bus_conductor_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getconductors(){
        $this->db->query('SELECT * FROM conductor');

        return $this->db->resultSet();
        
    }
}

?>