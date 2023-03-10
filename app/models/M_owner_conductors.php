<?php

class M_owner_conductors{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function view_conductors(){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE owner_nic= :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }
    

    public function conductor_details($con_id){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$con_id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function avail_conductors(){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE owner_nic= :nic AND bus_no IS NULL ');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function find_conductor_ntc($con){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE fname= :fname');
        $this->db->bind(':fname',$con);
        $results = $this->db->single();
        return $results;

    }

    public function find_conductor_name($bus_no){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE bus_no= :bus_no');
        $this->db->bind(':bus_no',$bus_no);
        $results = $this->db->single();
        return $results;

    }
    
    public function reomve_assigned_conductor($old_con){
        // prepare query
        
        $this->db->query('UPDATE conductor SET bus_no = NULL WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$old_con);   
        $this->db->execute(); 

    }

}

?>