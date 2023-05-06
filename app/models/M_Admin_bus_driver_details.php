<?php

class M_Admin_bus_driver_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //function for get data from database to users driver table
    public function getdrivers(){
        $this->db->query('SELECT * FROM driver WHERE status = "active"');

        return $this->db->resultSet();
    }

    //function for get data from database to restore users driver table
    public function removedrivers(){
        $this->db->query('SELECT * FROM driver WHERE status = "deleted"');
        return $this->db->resultSet();
    }

    //function for restore the deleted bus driver (from deleted to active)
    public function resetdrivers($ntcNo){
        $this->db->query('UPDATE driver SET status = "active" WHERE ntcNo = :ntcNo');
        $this->db->bind(":ntcNo",$ntcNo);
        return $this->db->execute();

    }

    // function for delete the row from the users driver table
    public function deletedrivers($ntcNo){
        $this->db->query('UPDATE driver SET status = "deleted" WHERE ntcNo = :ntcNo');
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