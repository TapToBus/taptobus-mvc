<?php   
    class Staff_dashboard extends Controller {

        public function __construct()
        {
              if(! isLoggedIn()){
                direct('users/login');
            }              
        }

        public function staff_dash(){
            
                 $this->view('staff/staff_dashboard');
        }

    }