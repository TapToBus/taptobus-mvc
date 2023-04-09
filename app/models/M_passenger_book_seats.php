<?php

class M_passenger_book_seats{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    
    // get available buses when passenger fill and submit journey details form
    public function getAvailableBuses($from, $to, $date, $pCount){
        // find day using date
        $day = date('l', strtotime($date));

        $this->db->query('SELECT b.bus_no, b.ratings, b.responses , b.capacity, s.departure_time, s.ticket_price, s.id AS schedule_id, bs.id AS booked_seats_id, bs.available_seats_count 
            FROM schedule s 
            INNER JOIN bus b ON s.bus_no = b.bus_no 
            INNER JOIN booked_seats bs ON s.id = bs.schedule_id 
            WHERE s.from = :from AND s.to = :to AND s.day = :day AND bs.status = \'active\' AND bs.date=:date AND bs.available_seats_count >= :pCount
            ORDER BY s.departure_time;');
        
        // bind values
        $this->db->bind(':from', $from);
        $this->db->bind(':to', $to);
        $this->db->bind(':day', $day);
        $this->db->bind(':date', $date);
        $this->db->bind(':pCount', $pCount);

        // execte
        $result = $this->db->resultSet();

        return $result;
    }
}