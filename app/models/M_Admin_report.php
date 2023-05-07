<?php

class M_Admin_report{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function get_income_records(){

        // $this->db->query('SELECT record_id, bus_no, date, (5*amount)/100 AS profit FROM incomerecords');
        $this->db->query('SELECT `from`, `to`, bus_no, passenger_count, DATE(booked_datetime) AS date, (5*price)/100 AS profit FROM bookings ');

        return $this->db->resultSet();
        
    }

    public function get_search_income_records($date_from,$date_to){
        $sql = "SELECT `from`, `to`, bus_no, passenger_count, DATE(booked_datetime) AS date, (5*price)/100 AS profit FROM bookings ";
        
        if(!empty($date_from) && !empty($date_to)){
            $sql .= "WHERE DATE(booked_datetime) BETWEEN '$date_from' AND '$date_to'";
        }
        else if(!empty($date_from) && empty($date_to)) {
            $sql .= "WHERE DATE(booked_datetime) >= '$date_from'";
        }
        else if(empty($date_from) && !empty($date_to)){
            $sql .= "WHERE DATE(booked_datetime) <= '$date_to'";
        }
        

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;

    }


    public function get_total_income($date_from,$date_to){
        // $sql = "SELECT `from`, `to`, bus_no, passenger_count, DATE(booked_datetime) AS date, (5*price)/100 AS profit FROM bookings ";
        $sql = "SELECT SUM((5*price)/100) as sum_profit FROM bookings WHERE (DATE(booked_datetime) BETWEEN '$date_from' AND '$date_to') AND (DATE(booked_datetime) >= '$date_from') AND DATE(booked_datetime) <= '$date_to'";
        
        $this->db->query($sql);
        $result = $this->db->single();
        return $result;

    }
    // public function get_search_income_records($date_from,$date_to){

    //     $this->db->query("SELECT location_from, location_to, bus_no, passenger_count, DATE(booked_datetime) AS date, (5*price)/100 AS profit FROM bookings WHERE DATE(booked_datetime) BETWEEN '$date_from' AND '$date_to'");
    //     $result = $this->db->resultSet();
    //     return $result;

    // }
}

?>