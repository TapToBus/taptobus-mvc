<?php 
    class M_staff_schedule{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function createSchedule($data){
            $this->db->query("INSERT INTO schedule(bus_no, `from`,`to`,`day`,arrival_time,departure_time,ticket_price) VALUES(:bus_no, :location_from, :location_to, :day, :arrival_time, :departure_time, :ticket_price)");
            $this->db->bind(":bus_no",$data['bus_no']);
            $this->db->bind(":location_from",$data['Location_from']);
            $this->db->bind(":location_to",$data['Location_to']);
            $this->db->bind(":day",$data['day']);
            $this->db->bind(":arrival_time",$data['arrival_time']);
            $this->db->bind(":departure_time",$data['depature_time']);
            $this->db->bind(":ticket_price",$data['ticket_price']);

            return $this->db->execute();
        }

        public function viewSchedules(){   // booking tabel eke schedule_id column eka ekka check krnn ona   
            $this->db->query("SELECT s.id, s.bus_no, s.from, s.to, s.day, s.arrival_time, s.departure_time, s.ticket_price, b.id as bid FROM schedule s LEFT JOIN bookings b ON s.id = b.schedule_id order by s.day , s.arrival_time");
            return $this->db->resultSet();
           // (left join ekk damme schedul tabel eke serma data tika ganna saha booking tabel eke booking thiyn id tika ganna)
        }

        public function updateSchedule($data){
            $this->db->query("UPDATE schedule SET bus_no = :bus_no, `from` = :location_from, `to` = :location_to, day = :day, arrival_time = :arrival_time, departure_time = :departure_time, ticket_price = :ticket_price WHERE id = :schedule_id");
            $this->db->bind(":bus_no",$data['bus_no']);
            $this->db->bind(":location_from",$data['Location_from']);
            $this->db->bind(":location_to",$data['Location_to']);
            $this->db->bind(":day",$data['day']);
            $this->db->bind(":arrival_time",$data['arrival_time']);
            $this->db->bind(":departure_time",$data['depature_time']);
            $this->db->bind(":ticket_price",$data['ticket_price']);
            $this->db->bind(":schedule_id",$data['schedule_id']);
            return $this->db->execute();
        }

        public function deleteSchedule($schedule_id){
            $this->db->query("DeLETE FROM schedule WHERE id = :schedule_id");
            $this->db->bind(":schedule_id",$schedule_id);
            return $this->db->execute();
        }

        // public function checkBusInBooking($bus_no){
        //     $this->db->query("SELECT * FROM bookings WHERE bus_no = :bus_no");
        //     $this->db->bind(":bus_no",$bus_no);
        //     $res = $this->db->resultSet();
        //     if($res){
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }
    }
?>