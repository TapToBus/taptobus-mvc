<?php

class Passenger_map extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    
    public function map(){
        $this->view('passenger/map');
    }
}