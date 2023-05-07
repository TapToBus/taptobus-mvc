<?php

class M_passenger_bookings{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBookings($passenger_nic){
        $this->db->query('SELECT id, bus_no, `from`, `to`, 
                            DATE(departure_datetime) as date, TIME(departure_datetime) as time, departure_datetime
                            FROM bookings 
                            WHERE passenger_nic = :passenger_nic AND status = \'pending\'
                            ORDER BY departure_datetime');


        $this->db->bind(':passenger_nic', $passenger_nic);
        $result = $this->db->resultSet();

        return $result;
    }


    public function getBookingDetails($boks_id){
        $this->db->query('SELECT * FROM bookings WHERE id=:boks_id');
    }
}