<?php

class M_passenger_bookings{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBookings($passenger_nic){
        $this->db->query('SELECT id AS booking_id, bus_no, `from`, `to`, departure_datetime 
                            FROM bookings 
                            WHERE passenger_nic = :passenger_nic
                            ORDER BY departure_datetime');


        $this->db->bind(':passenger_nic', $passenger_nic);
        $result = $this->db->resultSet();

        return $result;
    }
}