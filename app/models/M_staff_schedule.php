<?php 
    class M_staff_schedule{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function createSchedule($data){
            $this->db->query("INSERT INTO schedule(bus_no, Location_from,Location_To,day,arrival_time,depature_time,ticket_price) VALUES(:bus_no, :location_from, :location_to, :day, :arrival_time, :depature_time, :ticket_price)");
            $this->db->bind(":bus_no",$data['bus_no']);
            $this->db->bind(":location_from",$data['Location_from']);
            $this->db->bind(":location_to",$data['Location_to']);

        }

        public function viewSchedules(){
            $this->db->query("SELECT * FROM schedule ");
            return $this->db->resultSet();

        }
    }
?>