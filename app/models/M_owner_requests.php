<?php

class M_owner_requests{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_owner_request($data){

        $id = $data['nic'];

        // prepare query 
        $this->db->query('INSERT INTO owner_request (owner_nic) VALUES (:owner_nic)');

        // bind values
        $this->db->bind(':owner_nic', $id); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>