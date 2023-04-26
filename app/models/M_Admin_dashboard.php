<?php

class M_Admin_dashboard{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    // get all users count
    public function get_user_count(){
        $this->db->query("SELECT COUNT(*) AS user_count FROM user");
        return $this->db->single();
    }

    //get all passengers count
    public function get_passenger_count(){
        $this->db->query("SELECT COUNT(*) AS passenger_count FROM passenger");
        return $this->db->single();
    }

    //get all owners count
    public function get_owner_count(){
        $this->db->query("SELECT COUNT(*) AS owner_count FROM owner");
        return $this->db->single();
    }

    //get all buses count
    public function get_bus_count(){
        $this->db->query("SELECT COUNT(*) AS bus_count FROM bus");
        return $this->db->single();
    }

}
?>