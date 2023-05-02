<?php

class M_Admin_report{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function get_income_records(){

        // $this->db->query('SELECT record_id, bus_no, date, (5*amount)/100 AS profit FROM incomerecords');

        $this->db->query('SELECT location_from, location_to, bus_no, passenger_count, DATE(booked_datetime) AS date, (5*price)/100 AS profit FROM bookings');

        // $this->db->query('SELECT b.owner_nic, MONTHNAME(i.date) as month, SUM(i.amount)*0.05 as profit FROM bus b JOIN incomerecords i ON b.bus_no = i.bus_no GROUP BY b.owner_nic, MONTH(i.date)');

        return $this->db->resultSet();
        
    }

    public function get_search_income_records($date_from,$date_to){

        $this->db->query("SELECT record_id, bus_no, date, (5*amount)/100 AS profit FROM incomerecords WHERE date BETWEEN '$date_from' AND '$date_to'");
        $result = $this->db->resultSet();
        return $result;

    }
}

// class M_Admin_report{
//     private $db;

//     public function __construct(){
//         $this->db = new Database();
//     }

//     public function get_Date_From_Date_To_Report($data){

//         //search fro given value and get the data form database
        


//     }
    
// }
?>