<?php

class M_passenger_notifications{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getNotifications() {
        $this->db->query('SELECT s.notice_id, s.title, s.description, DATE(date_from) as date, TIME(time_stamp) as time
                FROM special_notices s
                INNER JOIN notice_available_users nau
                ON s.notice_id = nau.notice_id 
                WHERE nau.user = \'passenger\'
                ORDER BY time_stamp DESC;');
    
        return $this->db->resultSet();
    }    
}