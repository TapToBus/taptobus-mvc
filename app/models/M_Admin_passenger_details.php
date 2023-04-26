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

    //search function

    public function getSearchPassengers($search)
      {
        $this->db->query("SELECT * FROM passenger WHERE CONCAT(fname,lname) LIKE '%$search%' OR nic LIKE '%$search%' OR mobile_no LIKE '%$search' OR email LIKE '%$search'");
        $result=$this->db->resultSet();
        return $result;
      }
}

?>