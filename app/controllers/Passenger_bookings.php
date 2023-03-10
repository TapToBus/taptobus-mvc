<?php

class Passenger_bookings extends Controller{
    private $bookingsModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->bookingsModel = $this->model('m_passenger_bookings');
    }

    
    public function bookings(){
        $bookings = $this->bookingsModel->getBookings($_SESSION['user_id']);
        
        $data = [
            'bookings' => $bookings
        ];

        $this->view('passenger/bookings', $data);
    }
}