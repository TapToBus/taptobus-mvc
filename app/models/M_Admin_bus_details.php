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


    //for search

    public function getSearchBuses($search)
    {
      $this->db->query("SELECT * FROM bus WHERE bus_no LIKE '%$search%' OR root_no LIKE '%$search%' OR capacity LIKE '%$search%' OR con_ntc LIKE '%$search' OR dri_ntc LIKE '%$search' OR owner_nic LIKE '%$search%' OR ratings LIKE '%$search%' OR total_ratings LIKE '%$search%' OR responses LIKE '%$search%'");
      $result=$this->db->resultSet();
      return $result;
    }

}
?>