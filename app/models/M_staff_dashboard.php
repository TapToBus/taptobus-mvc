<?php 

     class M_staff_dashboard {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        // get total no of users
        public function getTotalUsers(){
            $this->db->query("SELECT COUNT(*) AS user_count FROM user");
            return $this->db->single();
        }
        // get total no of buses
        public function getTotalBusses($status){
            $this->db->query("SELECT COUNT(*) AS num_buses FROM bus WHERE status = :status");
            $this->db->bind('status', $status);
            return $this->db->single();
        }
        // get total no of owners
        public function getTotalOwners($status){
            $this->db->query("SELECT COUNT(*) AS num_owners FROM owner WHERE status = :status");
            $this->db->bind('status', $status);
            return $this->db->single();
        }
        // get total no of drivers
        public function getTotalDrivers($status){
            $this->db->query("SELECT COUNT(*) AS num_drivers FROM driver WHERE status = :status");
            $this->db->bind('status', $status);
            return $this->db->single();
        }
        // get total no of busse
        public function getTotalConductors($status){
            $this->db->query("SELECT COUNT(*) AS num_conductors FROM conductor WHERE status = :status");
            $this->db->bind('status', $status);
            return $this->db->single();
        }

        //------- doughnut chart----------

        public function currentUsersDoughnutChart(){
            $this->db->query("SELECT type, COUNT(*) AS count from user WHERE (type ='conductor' OR type='driver' OR type = 'owner') GROUP BY type");
            return $this->db->resultSet();
        }

        // ----------Line chart----------

        public function currentUsersLineChart(){
            $this->db->query("SELECT MONTHNAME(DATE(active_date)) AS month, COUNT(*) AS count from user WHERE (type ='conductor' OR type = 'driver' OR type = 'owner') GROUP BY month order by active_date");
            return $this->db->resultSet();            
        }
        
     }