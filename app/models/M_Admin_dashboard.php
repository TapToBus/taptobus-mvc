<?php

class M_Admin_dashboard{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get_user_count(){
        $this->db->query("SELECT COUNT(*) AS user_count FROM user");
        return $this->db->single();
    }
}
?>