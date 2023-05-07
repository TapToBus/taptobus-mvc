<?php

class M_Admin_passenger_details{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getpassengers(){
        // $this->db->query('SELECT * FROM passenger WHERE status = "active"');

        $this->db->query('SELECT p.nic, p.fname, p.lname, p.email, p.mobile_no, COUNT(*) AS journey_count FROM passenger p JOIN history h ON p.nic = h.passenger_nic WHERE p.status = "active" GROUP BY p.nic');

        return $this->db->resultSet();
    }

    //search function

    public function getSearchPassengers($search)
      {

        $this->db->query("SELECT p.nic, p.fname, p.lname, p.email, p.mobile_no,COUNT(*) AS journey_count FROM passenger p JOIN history h ON p.nic = h.passenger_nic WHERE CONCAT(p.fname,p.lname) LIKE '%$search%' OR p.nic LIKE '%$search%' OR p.mobile_no LIKE '%$search%' OR p.email LIKE '%$search%'");
        // $this->db->query("SELECT * FROM passenger WHERE CONCAT(fname,lname) LIKE '%$search%' OR nic LIKE '%$search%' OR mobile_no LIKE '%$search' OR email LIKE '%$search'");
        $result=$this->db->resultSet();
        return $result;
      }
}

?>