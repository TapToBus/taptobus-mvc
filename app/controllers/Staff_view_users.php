<?php
    class Staff_view_users extends Controller{

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }            
        }

        public function view_users(){
            
            $this->view('staff/staffusers');
        }

        public function view_passenger(){
            $this->view('staff/p_details');
        }

        public function view_bus_owner(){
            $this->view('staff/bo_details');
        }

        public function view_driver(){
            $this->view('staff/d_details');
        }

        public function view_conductor(){
            $this->view('staff/c_details');
        }

        public function view_staff(){
            $this->view('staff/s_details');
        }

        public function view_bus(){
            $this->view('staff/bus_details');
        }




    }
?>