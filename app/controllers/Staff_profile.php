<?php 
    class staff_profile extends Controller{

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }
        }

        public function viewprofile(){
            $this->view('staff/staff_profile');
        }


    }
?>