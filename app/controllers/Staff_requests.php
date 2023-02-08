<?php

class Staff_requests extends Controller{

    public function __consttruct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

    }

    public function view_requests(){

        $this->view('staff/staff_requests');
    }

}