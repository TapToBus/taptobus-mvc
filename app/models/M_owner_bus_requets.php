<?php

class M_owner_bus_requests{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_bus_request($data){

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO bus_request (request_id,bus_no) VALUES (:request_id, :bus_no)');

        // bind values
        $id = uniqid();
        $this->db->bind(':request_id', $id);
        $this->db->bind(':bus_no', $data['bus_no']); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>