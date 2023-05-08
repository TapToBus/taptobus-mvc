<?php

class M_driver_schedule
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function find_bus_no(){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE ntcNo = :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->single();
        return $results;

    } 

   public function view_schedule($bus_no){


    $currentDate = date('l'); 
    $twoDaysLater = date('l', strtotime('+2 days'));

    $this->db->query(" SELECT * FROM schedule WHERE bus_no = :bus_no ORDER BY day ASC ");

    $this->db->bind(':bus_no', $bus_no);
    // $this->db->bind(':currentDate', $currentDate);
    // $this->db->bind(':twoDaysLater', $twoDaysLater);

    $results = $this->db->resultSet();
    return $results;

   }
}


// day >= '$currentDate' AND day <= '$twoDaysLater' AND