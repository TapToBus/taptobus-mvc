<?php

class M_Admin_bus_conductor_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //function for get the values from databse and display
    public function getconductors(){
        $this->db->query('SELECT * FROM conductor WHERE status = "active"');

        return $this->db->resultSet();
        
    }


    // function for delete the row from the table
    public function deleteconductors($ntcNo){
        $this->db->query('UPDATE conductor SET status = "pending" WHERE ntcNo = :ntcNo');
        $this->db->bind(":ntcNo", $ntcNo);
        return $this->db->execute();
    }

    //function for get the values from database and display
    public function removeconductors(){
        $this->db->query('SELECT * FROM conductor WHERE status = "pending"');
        return $this->db->resultSet();
    }

    // function for restore the row from the table
    public function resetconductors($ntcNo){
        $this->db->query("UPDATE conductor SET status = 'active' WHERE ntcNo = :ntcNo");
        $this->db->bind(":ntcNo", $ntcNo);
        return $this->db->execute();

    }

    //search function

    public function getSearchBusConductors($search)
      {
        $this->db->query("SELECT * FROM conductor WHERE CONCAT(fname,lname) LIKE '%$search%' OR ntcNo LIKE '%$search%' OR nic LIKE '%$search%' OR mobileNo LIKE '%$search' OR email LIKE '%$search'");
        $result=$this->db->resultSet();
        return $result;
      }
}

?>