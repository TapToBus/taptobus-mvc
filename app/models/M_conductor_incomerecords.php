<?php

class M_conductor_incomerecords{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_incomerecords($data){

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO incomerecords (bus_no,date,amount) VALUES (:bus_no,:date,:amount)');

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

    public function view_incomerecords(){

      
    }


}

?>