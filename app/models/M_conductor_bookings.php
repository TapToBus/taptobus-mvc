<?php

class M_conductor_bookings
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

   public function check_bookings($input){

    // prepare query
    $this->db->query('SELECT bus_no,from,to,date,passenger_count,booked_seats from bookings WHERE booking_code LIKE :input% ');

    $this->db->bind(':input', $input);
    $results = $this->db->resultSet();
    return $results;

   }
}
