<?php

class M_owner_conductor_requests{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_con_request($data){

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO conductor_request (owner_nic,conductor_ntc) VALUES (:owner_nic, :conductor_ntc)');

        // bind values
        $this->db->bind(':owner_nic', $id);
        $this->db->bind(':conductor_ntc', $data['ntcNo']); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>