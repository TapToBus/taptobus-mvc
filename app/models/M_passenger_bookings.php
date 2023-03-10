<?php

class M_passenger_bookings{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getBookings($nic){
        $this->db->query('SELECT * FROM bookings WHERE passenger_nic = :nic ORDER BY date, departure_time;');

        $this->db->bind(':nic', $nic);

        $result = $this->db->resultSet();

        return $result;
    }
}