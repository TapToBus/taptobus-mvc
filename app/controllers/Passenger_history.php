<?php

class Passenger_history extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function history(){
        $this->view('passenger/history');
    }
}