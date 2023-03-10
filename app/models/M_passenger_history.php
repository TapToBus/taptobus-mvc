<?php

class M_passenger_history{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getHistory($nic){
        $this->db->query('SELECT * FROM history WHERE passenger_nic = :nic ORDER BY date DESC, started_time DESC;');

        $this->db->bind(':nic', $nic);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getFullHistory($id){
        $this->db->query('SELECT * FROM history WHERE id = :id;');

        $this->db->bind(':id', $id);

        $result = $this->db->single();

        return $result;
    }
}