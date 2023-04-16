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
        $result = $this->bookingsModel->getAllBookings($_SESSION['user_id']);

        $data = [];

        if(! empty($result)){
            foreach ($result as $row) {
                $booking = new stdClass();
                
                $booking->booking_id = $row->id;
                $booking->bus_no = $row->bus_no;
                $booking->from = $row->from;
                $booking->to = $row->to;

                $dateTime = $this->separateDateTime($row->departure_datetime);
                $booking->departure_date = $dateTime["date"];
                $booking->departure_time = $dateTime["time"];

                
                $remainingTime = $this->calculateRemainingTime($row->departure_datetime);
                $booking->remaining_days = $remainingTime["remaining_days"];
                $booking->remaining_hours = $remainingTime["remaining_hours"];

                array_push($data, $booking);
            }                            
        }

        $this->view('passenger/bookings', $data);
    }


    function separateDateTime($dateTimeStr){
        $dateTimeArr = explode(" ", $dateTimeStr);
        $date = $dateTimeArr[0];
        $time = date("g:i A", strtotime($dateTimeArr[1]));
        return array("date" => $date, "time" => $time);
    }


    function calculateRemainingTime($dateTimeStr){
        $givenDateTime = new DateTime($dateTimeStr);
        $currentDateTime = new DateTime('now');
        $timeDiff = $givenDateTime->diff($currentDateTime);

        $remainingDays = $timeDiff->days;
        $remainingHours = $timeDiff->h;

        return array("remaining_days" => $remainingDays, "remaining_hours" => $remainingHours);
    }
    
    
    function booking_details(){
        echo 'Hello...!' . '<br>booking_id : ' . $_GET['booking_id'];
    }
}