<?php

class M_passenger_profile{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getProfileDetails($nic){
        $this->db->query('SELECT * FROM passenger WHERE nic = :nic;');

        $this->db->bind(':nic', $nic);

        // $result = $this->db->resultSet();
        $result = $this->db->single();

        return $result;
    }

    public function getTotalHistoryCount($nic){
        $this->db->query('SELECT COUNT(id) AS count FROM history WHERE passenger_nic = :nic;');

        $this->db->bind(':nic', $nic);

        $result = $this->db->single();

        return $result;
    }

    public function getTotalJourneyCount($nic){
        $this->db->query('SELECT COUNT(id) AS count FROM history WHERE passenger_nic = :nic AND status = \'Used\';');

        $this->db->bind(':nic', $nic);

        $result = $this->db->single();

        return $result;
    }

    public function recentBooking($nic){
        $this->db->query('SELECT * FROM bookings WHERE passenger_nic = :nic ORDER BY date, departure_time LIMIT 1;');

        $this->db->bind(':nic', $nic);

        $result = $this->db->single();

        return $result;
    }

    public function recentHistory($nic){
        $this->db->query('SELECT * FROM history WHERE passenger_nic = :nic ORDER BY date DESC, started_time DESC LIMIT 1;');

        $this->db->bind(':nic', $nic);

        $result = $this->db->single();

        return $result;
    }
}