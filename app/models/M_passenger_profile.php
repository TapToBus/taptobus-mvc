<?php

class M_passenger_profile{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getPassengerDetails($passenger_nic){
        $this->db->query('SELECT nic, fname, lname, email, mobile_no, pic, password_hash 
                        FROM passenger 
                        WHERE nic = :passenger_nic AND status = \'active\';');
        $this->db->bind(':passenger_nic', $passenger_nic);
        $result = $this->db->resultSet();

        return $result;
    }


    public function getJourneysCount($passenger_nic){
        $this->db->query('SELECT id 
                    FROM history 
                    WHERE passenger_nic = :passenger_nic AND status = \'Used\';');
        $this->db->bind(':passenger_nic', $passenger_nic);
        
        $this->db->execute();
        $result = $this->db->rowCount();

        return $result;
    }


    public function getCancellationsCount($passenger_nic){
        $this->db->query('SELECT id 
                    FROM history 
                    WHERE passenger_nic = :passenger_nic AND status = \'Cancelled\';');
        $this->db->bind(':passenger_nic', $passenger_nic);
        
        $this->db->execute();
        $result = $this->db->rowCount();

        return $result;
    }


    public function getPreviousJourney($passenger_nic){
        $this->db->query('SELECT `from`, `to`
                    FROM history 
                    WHERE passenger_nic = :passenger_nic AND status = \'Used\'
                    ORDER BY date DESC, started_time DESC
                    LIMIT 1;');
        $this->db->bind(':passenger_nic', $passenger_nic);
        
        $result = $this->db->single();

        return $result;
    }


    public function getNextJourney($passenger_nic){
        $this->db->query('SELECT `from`, `to`
                    FROM bookings 
                    WHERE passenger_nic = :passenger_nic
                    ORDER BY departure_datetime
                    LIMIT 1;');
        $this->db->bind(':passenger_nic', $passenger_nic);
        
        $result = $this->db->single();

        return $result;
    }
}