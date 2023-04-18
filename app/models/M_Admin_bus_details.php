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

    public function removebuses(){
        $this->db->query('SELECT * FROM bus WHERE status = "pending"');
        return $this->db->resultSet();
    }

    public function resetbuses($bus_no){
        $this->db->query('UPDATE bus SET status = "active" WHERE bus_no = :bus_no');
        $this->db->bind(":bus_no",$bus_no);
        return $this->db->execute();

    }

}
?>