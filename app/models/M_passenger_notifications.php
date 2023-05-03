<?php

class M_passenger_notifications{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getNotifications(){
        $this->db->query('SELECT * 
                FROM special_notices
                INNER JOIN notice_available_users
                ON special_notices.notice_id = notice_available_users.notice_id 
                WHERE notice_available_users.user = \'passenger\';');

        return $this->db->resultSet();
    }
}