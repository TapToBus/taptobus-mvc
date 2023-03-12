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

        $this->db->query('SELECT bus.bus_no, bus.ratings, bus.responses, s1.departure_time, s1.ticket_price, s1.id FROM schedule AS s1 INNER JOIN bus ON s1.bus_no=bus.bus_no WHERE s1.from = :from AND s1.to = :to AND s1.day = :day AND bus.status=\'active\' ORDER BY s1.departure_time;');

        // bind values
        $this->db->bind(':from', $from);
        $this->db->bind(':to', $to);
        $this->db->bind(':day', $day);

        // execte
        $result = $this->db->resultSet();

        return $result;
    }
}