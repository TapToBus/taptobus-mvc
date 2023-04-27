<?php

class M_conductor_schedule
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function find_bus_no(){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE nic = :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    } 

   public function view_schedule($bus_no){


    $currentDate = date('l'); 
    $twoDaysLater = date('l', strtotime('+2 days'));

    $this->db->query(" SELECT * FROM schedule WHERE day >= '$currentDate' AND day <= '$twoDaysLater' AND bus_no = :bus_no ");

    $this->db->bind(':bus_no', $bus_no);
    $results = $this->db->resultSet();
    return $results;

   }
}
