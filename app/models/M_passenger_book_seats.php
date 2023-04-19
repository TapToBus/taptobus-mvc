<?php

class M_passenger_book_seats{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    
    public function getAvailableBuses($from, $to, $date, $count){
        // find day using date
        $day = date('l', strtotime($date));

        $this->db->query('SELECT sch.id as sch_id, sch.departure_time, sch.ticket_price,
                    b.bus_no, b.capacity, b.ratings, b.responses,
                    boks.id as boks_id, boks.available_seats_count
                    FROM schedule sch 
                    INNER JOIN bus b ON sch.bus_no = b.bus_no 
                    INNER JOIN booked_seats boks ON sch.id = boks.schedule_id AND sch.bus_no = boks.bus_no
                    WHERE sch.from = :from
                    AND sch.to = :to
                    AND sch.day = :day 
                    AND boks.date = :date
                    AND b.status = \'active\'
                    AND b.dri_ntc IS NOT NULL
                    AND b.con_ntc IS NOT NULL
                    AND boks.status = \'available\' 
                    AND boks.available_seats_count >= :count
                    ORDER BY sch.departure_time;');
        
        $this->db->bind(':from', $from);
        $this->db->bind(':to', $to);
        $this->db->bind(':day', $day);
        $this->db->bind(':date', $date);
        $this->db->bind(':count', $count);

        $result = $this->db->resultSet();

        return $result;
    }


    public function getBusDetails($bus_no){
        $this->db->query('SELECT bus_no, capacity, bus_image, wifi, usb, tv, ratings, responses, dri_ntc AS driver_ntc, con_ntc AS conductor_ntc
                    FROM bus
                    WHERE bus_no = :bus_no AND status=\'active\';');
        
        $this->db->bind(':bus_no', $bus_no);
        $result = $this->db->single();

        return $result;
    }


    public function getRidesCount($bus_no){
        $this->db->query('SELECT COUNT(id) AS count FROM history WHERE bus_no = :bus_no;');
        $this->db->bind(':bus_no', $bus_no);
        $rides = $this->db->single();

        return $rides;
    }


    public function getDriverDetails($driver_ntc){
        $this->db->query('SELECT ntcNo, fname, lname, ratings, responses, pic
                    FROM driver
                    WHERE ntcNo = :driver_ntc;');
        
        $this->db->bind(':driver_ntc', $driver_ntc);
        $result = $this->db->single();

        return $result;
    }


    public function getConductorDetails($conductor_ntc){
        $this->db->query('SELECT ntcNo, fname, lname, ratings, responses, pic
                    FROM conductor
                    WHERE ntcNo = :conductor_ntc;');
        
        $this->db->bind(':conductor_ntc', $conductor_ntc);
        $result = $this->db->single();

        return $result;
    }
}