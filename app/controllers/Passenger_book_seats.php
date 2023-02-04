<?php

class Passenger_book_seats extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function journey_details(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // intialize data
            $data = [
                'from' => $_POST['from'],
                'to' => $_POST['to'],
                'date' => $_POST['date'],
                'count' => $_POST['count'],
                'from_err' => '',
                'to_err' => '',
                'date_err' => '',
                'count_err' => ''
            ];

            //print_r($data);


            // validate data

            // validate starting point
            if($data['from'] == 'default'){
                $data['from_err'] = 'Starting point is required';
            }

            // validate ending point
            if($data['to'] == 'default'){
                $data['to_err'] = 'Ending point is required';
            }elseif($data['from'] == $data['to']){
                $data['to_err'] = 'Starting and ending points can\'t be same';
            }

            // validate date
            if(empty($data['date'])){
                $data['date_err'] = 'Date is required';
            }elseif($data['date'] < date("Y-m-d")){
                $data['date_err'] = 'Date must be today or a upcoming date';
            }

            // validate passenger count
            if($data['count'] == 'default'){
                $data['count_err'] = 'Passenger count is required';
            }


            // make sure errors are empty
            if(empty($data['from_err']) && empty($data['to_err']) && 
            empty($data['date_err']) && empty($data['count_err'])){
                // direct to the available buses page         
                
                direct('passenger_book_seats/available_buses');
            }else{
                // load the view with errors
                $this->view('passenger/journey_details', $data);
            }
        }else{
            // intialize default values
            $data = [
                'from' => '',
                'to' => '',
                'date' => '',
                'count' => '',
                'from_err' => '',
                'to_err' => '',
                'date_err' => '',
                'count_err' => ''
            ];

            // load the view
            $this->view('passenger/journey_details', $data);
        }
    }

    public function available_buses(){
        $this->view('passenger/available_buses');
    }

    public function bus_details(){
        $this->view('passenger/bus_details');
    }
}