<?php
    class Staff_view_users extends Controller{

        public function __construct()
        {
            
        }

        public function viewusers(){
            
            $this->view('staff/users');
        }


    }
?>