<?php
 class M_Admin_bus_owner_details{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getowners(){
        $this->db->query('SELECT * FROM owner WHERE status = "active"');

        return $this->db->resultSet();
    }

    // function for delete the row from the table
    public function deleteowners($nic){
        $this->db->query('UPDATE owner SET status = "pending" WHERE nic = :nic');
        $this->db->bind(":nic", $nic);
        return $this->db->execute();
    }
 }
?>