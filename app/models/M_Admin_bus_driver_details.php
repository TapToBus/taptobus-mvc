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

    // function for delete the row from the table
    public function deletedrivers($ntcNo){
        $this->db->query('UPDATE driver SET status = "pending" WHERE ntcNo = :ntcNo');
        $this->db->bind(":ntcNo", $ntcNo);
        return $this->db->execute();
    }

    //
    //search function

    public function getSearchBusDrivers($search)
      {
        $this->db->query("SELECT * FROM driver WHERE CONCAT(fname,lname) LIKE '%$search%' OR ntcNo LIKE '%$search%' OR nic LIKE '%$search%' OR mobileNo LIKE '%$search' OR email LIKE '%$search'");
        $result=$this->db->resultSet();
        return $result;
      }
}

?>