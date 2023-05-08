<?php

class Passenger_bookings extends Controller{
    private $bookingsModel;
    private $passengerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->bookingsModel = $this->model('m_passenger_bookings');
        $this->passengerModel = $this->model('m_passenger_profile');
    }

    
    public function bookings(){
        $data = [
            'bookings' => $this->bookingsModel->getAllBookings($_SESSION['user_id'])
        ];
    
        $this->view('passenger/bookings', $data);
    }
    
    
    public function booking_details(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $bok_id = $_POST['booking_id'];
            $refund = $this->bookingsModel->updateHistory($bok_id);
            $passenger = $this->passengerModel->getPassengerDetails($_SESSION['user_id']);

            $mailer = new Mailer(TAPTOBUS_EMAIL, TAPTOBUS_PASS, 'TapToBus');
            $subject = refundSubject();
            $body = refundBody($passenger->fname, $refund);

            if($mailer->send($passenger->email, $subject, $body)){
                direct('passenger_bookings/bookings');
            }else{
                die('Sorry! Something went wrong');
            }
        }else{
            $bok_id = $_GET['bok_id'];

            $data = [
                'booking' => $this->bookingsModel->getBookingDetails($bok_id)
            ];

            $this->view('passenger/booking_details', $data);
        }
    }
}