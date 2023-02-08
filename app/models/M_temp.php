<?php

class M_temp{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }


    public function findBus($from, $to, $date, $count){
        $this->db->query('SELECT * FROM temp_bus WHERE from = :from AND to = :to AND date = :date AND available_seats >= :count');

        $this->db->bind(':from', $from);
        $this->db->bind(':to', $to);
        $this->db->bind(':date', $date);
        $this->db->bind(':count', $count);

        $row = $this->db->execute();

        // --------------------------------
        if($row){
            return $row;    // 
        }else{
            return false;
        }
    }

    public function findBusRecord(){

    }
}
