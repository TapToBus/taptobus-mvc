<?php

class M_conductor_incomerecords{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_incomerecords($data){

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO incomerecords (user_ntc,bus_no,date,amount) VALUES (:user_ntc,:bus_no,:date,:amount)');

        $this->db->bind(':user_ntc', $id);
        $this->db->bind(':bus_no', $data['bus_no']); 
        $this->db->bind(':date', $data['date']); 
        $this->db->bind(':amount', $data['amount']); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function view_incomerecords($data){

            // prepare query
            $this->db->query('SELECT * from incomerecords WHERE bus_no= :bus_no');
           
            $this->db->bind(':bus_no',$data);
            $results = $this->db->resultSet();
            return $results;
    
        
    }


}

?>