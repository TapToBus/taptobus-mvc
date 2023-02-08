<?php
 class M_Admin_bus_owner_details{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getowners(){
        $this->db->query('SELECT * FROM owner');

        return $this->db->resultSet();
    }
 }
?>