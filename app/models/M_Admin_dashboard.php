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

    //get all users count for admin dashboard doghtnut chart
    public function getUserChartCount(){
        $this->db->query("SELECT type,COUNT(*) AS count FROM user GROUP BY type");
        return $this->db->resultSet();
    }

    //get all users new adding to the system for new users line chart
    public function getUserAddDateChart(){
        $this->db->query("SELECT MONTH(active_date) AS month,COUNT(*) AS count FROM user GROUP BY month");
        return $this->db->resultSet();
    }

    //get all passenger new adding to the system for new passenger line chart
    public function getPassengerAddDateChart(){
        $this->db->query("SELECT MONTH(joined_datetime) AS month,COUNT(*) AS count FROM passenger GROUP BY month");
        return $this->db->resultSet();

    }

    //get all buses new adding to the system for new bus bar chart
    public function getBusAddDateChart(){
        $this->db->query("SELECT MONTH(joined_datetime) AS month,COUNT(*) AS count FROM bus GROUP BY month");
        return $this->db->resultSet();
    }

}
?>