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
        $this->db->query("SELECT COUNT(*) AS passenger_count FROM passenger WHERE status = 'active'");
        return $this->db->single();
    }

    //get all owners count
    public function get_owner_count(){
        $this->db->query("SELECT COUNT(*) AS owner_count FROM owner WHERE status = 'active'");
        return $this->db->single();
    }

    //get all buses count
    public function get_bus_count(){
        $this->db->query("SELECT COUNT(*) AS bus_count FROM bus WHERE status = 'active'");
        return $this->db->single();
    }

    //get all users count for admin dashboard doghtnut chart
    public function getUserChartCount(){
        $this->db->query("SELECT type,COUNT(*) AS count FROM user GROUP BY type");
        return $this->db->resultSet();
    }

    //get all users new adding to the system for new users line chart
    public function getUserAddDateChart(){
        $this->db->query("SELECT MONTHNAME(active_date) AS month,COUNT(*) AS count FROM user GROUP BY month");
        // $this->db->query("SELECT MONTHNAME(active_date) AS month,COUNT(*) AS count FROM user WHERE type = 'passenger || owner || conductor || driver' GROUP BY month");
        return $this->db->resultSet();
    }

    //get all passenger new adding to the system for new passenger line chart
    public function getPassengerAddDateChart(){
        $this->db->query("SELECT MONTHNAME(joined_datetime) AS month,COUNT(*) AS count FROM passenger WHERE status = 'active' GROUP BY month ");
        return $this->db->resultSet();

    }

    //get all buses new adding to the system for new bus bar chart
    public function getBusAddDateChart(){
        $this->db->query("SELECT MONTHNAME(joined_datetime) AS month,COUNT(*) AS count FROM bus WHERE status = 'active' GROUP BY month");
        return $this->db->resultSet();
    }

    //get system profit from income (incomerecordes and bus table)
    public function getProfit(){
        // $this->db->query('SELECT b.owner_nic, MONTHNAME(i.date) as month, SUM(i.amount)*0.05 as profit FROM bus b JOIN incomerecords i ON b.bus_no = i.bus_no GROUP BY b.owner_nic, MONTH(i.date)');
        $this->db->query('SELECT bu.owner_nic, MONTHNAME(bo.booked_datetime) as month, SUM(bo.price)*0.05 as profit FROM bus bu JOIN bookings bo ON bu.bus_no = bo.bus_no GROUP BY bu.owner_nic, MONTH(bo.booked_datetime)');
        return $this->db->resultSet();
    }

    //get system profit into chart
    public function getProfitChart(){

        // $this->db->query('SELECT MONTHNAME(bo.booked_datetime) as month, SUM((bo.price)*0.05) as profit FROM bus bu JOIN bookings bo ON bu.bus_no = bo.bus_no GROUP BY MONTH(bo.booked_datetime)');
        $this->db->query('SELECT MONTHNAME(booked_datetime) as month, SUM((price)*0.05) as profit FROM bookings GROUP BY MONTH(booked_datetime)');
        return $this->db->resultSet();

    } 

}
?>