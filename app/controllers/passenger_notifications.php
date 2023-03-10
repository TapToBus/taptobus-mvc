<?php

class Passenger_notifications extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    
    public function notifications(){
        $this->view('passenger/notifications');
    }
}