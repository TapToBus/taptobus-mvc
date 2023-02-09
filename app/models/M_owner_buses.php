<?php

class M_owner_buses{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_bus($data){

        $id = $_SESSION['user_id'];
        // prepare query
        $this->db->query('INSERT INTO bus (bus_no,root_no,owner_name,pic,nic) VALUES (:bus_no, :root_no, :owner_name,:pic, :nic)');

        // bind values
        $this->db->bind(':bus_no', $data['bus_no']);
        $this->db->bind(':root_no', $data['root_no']);
        $this->db->bind(':owner_name', $data['owner_name']);
        $this->db->bind(':pic', NULL);
        $this->db->bind(':nic', $id);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function view_buses(){
        // prepare query
        $this->db->query('SELECT * from bus WHERE nic= :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

}