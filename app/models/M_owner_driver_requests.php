<?php

class M_owner_driver_requests{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_dr_request($data){

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO driver_request (owner_nic,driver_ntc) VALUES (:owner_nic, :driver_ntc)');

        // bind values
        $this->db->bind(':owner_nic', $id);
        $this->db->bind(':driver_ntc', $data['ntcNo']); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>