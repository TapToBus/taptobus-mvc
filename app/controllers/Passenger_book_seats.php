<?php

class Passenger_book_seats extends Controller{
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }
    }


    public function journey_details(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

            // validate data

            if($data['from'] == 'default'){
                $data['from_err'] = 'Starting point is required';
            }

            if($data['to'] == 'default'){
                $data['to_err'] = 'Ending point is required';
            }elseif($data['from'] == $data['to']){
                $data['to_err'] = 'Starting and ending points can\'t be same';
            }

            if(empty($data['date'])){
                $data['date_err'] = 'Date is required';
            }elseif($data['date'] < date("Y-m-d")){
                $data['date_err'] = 'Date must be today or a upcoming date';
            }

            if($data['count'] == 'default'){
                $data['count_err'] = 'Passenger count is required';
            }

            if(empty($data['from_err']) && empty($data['to_err']) &&  empty($data['date_err']) && empty($data['count_err'])){        
                direct('passenger_book_seats/available_buses?from=' . $data['from'] . '&to=' . $data['to'] . '&date=' . $data['date'] . '&count=' . $data['count']);
            }else{
                $this->view('passenger/journey_details', $data);
            }
        }else{
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

            $this->view('passenger/journey_details', $data);
        }
    }


    public function available_buses(){
        if(isset($_GET['from'], $_GET['to'], $_GET['date'], $_GET['count'])){
            $data = [
                'from' => $_GET['from'],
                'to' => $_GET['to'],
                'date' => $_GET['date'],
                'count' => $_GET['count']
            ];

            $this->view('passenger/available_buses', $data);
        }else{
            //die('Sorry! something went wrong');
            direct('passenger_book_seats/journey_details');
        }
    }


    public function bus_details(){
        //
    }

    public function select_seats(){
        //
    }
}