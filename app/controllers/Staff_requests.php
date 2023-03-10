<?php

class Staff_requests extends Controller{

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

    }

    public function view_requests(){

        $this->view('staff/staff_requests');
    }

}

?>