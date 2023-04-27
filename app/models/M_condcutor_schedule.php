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
        
        $this->db->query('SELECT * from conductor WHERE  ntcNo = :ntcNo');
        $id = $_SESSION['user_id'];
        $this->db->bind(':ntcNo',$id);
        $results = $this->db->single();
        return $results;

    } 

   public function view_schedule($bus_no){

    $this->db->query('SELECT * from bookings WHERE booking_code = :input ');

    $this->db->bind(':input', $input);
    $results = $this->db->resultSet();
    return $results;

   }
}
