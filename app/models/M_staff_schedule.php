<?php 
    class M_staff_schedule{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function createSchedule($data){
            $this->db->query("INSERT INTO schedule(bus_no, Location_from,Location_To,day,arrival_time,departure_time,ticket_price) VALUES(:bus_no, :location_from, :location_to, :day, :arrival_time, :departure_time, :ticket_price)");
            $this->db->bind(":bus_no",$data['bus_no']);
            $this->db->bind(":location_from",$data['Location_from']);
            $this->db->bind(":location_to",$data['Location_to']);
            $this->db->bind(":day",$data['day']);
            $this->db->bind(":arrival_time",$data['arrival_time']);
            $this->db->bind(":departure_time",$data['depature_time']);
            $this->db->bind(":ticket_price",$data['ticket_price']);

            return $this->db->execute();
        }

        public function viewSchedules(){
            $this->db->query("SELECT * FROM schedule order by day ");
            return $this->db->resultSet();

        }
    }
?>