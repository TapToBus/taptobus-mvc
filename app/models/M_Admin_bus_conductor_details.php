<?php

class M_Admin_bus_conductor_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getconductors(){
        $this->db->query('SELECT * FROM conductor WHERE status = "active"');

        return $this->db->resultSet();
        
    }

    public function removeconductors(){
        $this->db->query('SELECT * FROM conductor WHERE status = "pending"');
        return $this->db->resultSet();
    }

    public function resetconductors($ntcNo){
        $this->db->query("UPDATE conductor SET status = 'active' WHERE ntcNo = :ntcNo");
        $this->db->bind(":ntcNo", $ntcNo);
        return $this->db->execute();

    }
}

?>