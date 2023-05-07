<?php
 class M_Admin_bus_owner_details{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getowners(){
        // $this->db->query('SELECT * FROM owner WHERE status = "active"');

        $this->db->query('SELECT o.nic, o.fname, o.lname, o.email, o.mobileNo, COUNT(DISTINCT b.bus_no) AS bus_count, COUNT(DISTINCT c.ntcNo) AS conductor_count, COUNT(DISTINCT d.ntcNo) AS driver_count FROM owner o LEFT JOIN bus b ON o.nic = b.owner_nic LEFT JOIN conductor c ON o.nic = c.owner_nic LEFT JOIN driver d ON o.nic = d.owner_nic WHERE o.status = "active" GROUP BY o.nic ;');

        return $this->db->resultSet();
    }

    // function for delete the row from the table
    public function deleteowners($nic){
        $this->db->query('UPDATE owner SET status = "deleted" WHERE nic = :nic');
        $this->db->bind(":nic", $nic);
        return $this->db->execute();
    }

    //search function

    public function getSearchBusOwners($search)
      {
        // $this->db->query("SELECT * FROM owner WHERE CONCAT(fname,lname) LIKE '%$search%' OR nic LIKE '%$search%' OR mobileNo LIKE '%$search' OR email LIKE '%$search'");
       
        $this->db->query("SELECT o.nic, o.fname, o.lname, o.email, o.mobileNo, COUNT(DISTINCT b.bus_no) AS bus_count, COUNT(DISTINCT c.ntcNo) AS conductor_count, COUNT(DISTINCT d.ntcNo) AS driver_count FROM owner o LEFT JOIN bus b ON o.nic = b.owner_nic LEFT JOIN conductor c ON o.nic = c.owner_nic LEFT JOIN driver d ON o.nic = d.owner_nic WHERE CONCAT(o.fname, o.lname) LIKE '%$search%' OR o.nic LIKE '%$search%' OR o.email LIKE '%$search%' OR o.mobileNo LIKE '%$search%'");
        $result=$this->db->resultSet();
        return $result;
      }
 }
?>