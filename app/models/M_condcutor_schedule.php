<?php

class M_conductor_schedule
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

   public function view_schedule($input){

    $this->db->query('SELECT * from bookings WHERE booking_code = :input ');

    $this->db->bind(':input', $input);
    $results = $this->db->resultSet();
    return $results;

   }
}
