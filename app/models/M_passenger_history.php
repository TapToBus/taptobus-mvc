<?php

class M_passenger_history{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getHistory($passenger_nic){
        $this->db->query('SELECT id AS history_id, `from`, `to`, started_datetime, bus_no, status
                    FROM history
                    WHERE passenger_nic = :passenger_nic
                    ORDER BY started_datetime DESC;');
        $this->db->bind(':passenger_nic', $passenger_nic);
        
        $result = $this->db->resultSet();

        return $result;
    }


    public function getFullHistory($history_id){
        $this->db->query('SELECT * FROM history WHERE id = :history_id;');
        $this->db->bind(':history_id', $history_id);
        
        $result = $this->db->single();

        return $result;
    }
}