<?php

class M_Admin_bus_driver_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getdrivers(){
        $this->db->query('SELECT * FROM driver WHERE status = "active"');

        return $this->db->resultSet();
    }

    public function removedrivers(){
        $this->db->query('SELECT * FROM driver WHERE status = "pending"');
        return $this->db->resultSet();
    }

    public function resetdrivers($ntcNo){
        $this->db->query('UPDATE driver SET status = "active" WHERE ntcNo = :ntcNo');
        $this->db->bind(":ntcNo",$ntcNo);
        return $this->db->execute();

    }
}

?>