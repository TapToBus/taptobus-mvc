<?php

class Passenger_book_seats extends Controller{
    public function __construct(){
        
    }

    public function journey_details(){
        $this->view('passenger/journey_details');
    }
}