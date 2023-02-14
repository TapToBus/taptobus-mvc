<?php
    class Staff_view_requests extends Controller{

        public function __construct()
        {     if(! isLoggedIn()){
            direct('users/login');
            }       
            
        }

        // public function view_requests(){
            
        //     $this->view('staff/staff_requests');
        // }

        public function owner_requests(){
            $this->view('staff/owner_requests');
        }

        public function driver_requests(){
            $this->view('staff/driver_requests');
        }

        public function conductor_requests(){
            $this->view('staff/conductor_requests');
        }

        public function bus_requests(){
            $this->view('staff/bus_requests');
        }




    }
?>