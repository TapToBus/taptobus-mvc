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
        $data = [
            'bookings' => $this->bookingsModel->getAllBookings($_SESSION['user_id'])
        ];
    
        $this->view('passenger/bookings', $data);
    }
    
    
    public function booking_details(){
        $bok_id = $_GET['bok_id'];

        $data = [
            'booking' => $this->bookingsModel->getBookingDetails($bok_id)
        ];

        $this->view('passenger/booking_details', $data);
    }
}