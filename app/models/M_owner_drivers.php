<?php

class M_owner_drivers{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function view_drivers(){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE owner_nic= :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function driver_details(){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE owner_nic= :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

}

?>