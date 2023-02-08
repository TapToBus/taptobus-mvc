<?php

class Passenger_bookings extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function bookings(){
        $this->view('passenger/bookings');
    }

    public function booking_details(){
        $this->view('passenger/booking_details');
    }
}