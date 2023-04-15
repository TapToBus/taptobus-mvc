<?php

class M_Admin_History{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getremovepassenger(){
        $this->db->query('SELECT * FROM passenger');

        return $this->db->resultSet();
    }
}

?>