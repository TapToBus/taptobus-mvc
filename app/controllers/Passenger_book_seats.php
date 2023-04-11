<?php

class Passenger_book_seats extends Controller{
    private $availableBusModel;
    private $busModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->availableBusModel = $this->model('m_passenger_book_seats');
        $this->busModel = $this->model('m_passenger_book_seats');
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
            }

            if(empty($data['date'])){
                $data['date_err'] = 'Date is required';
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
                'count' => $_GET['count'],
                'availableBuses' => ''
            ];

            $data['availableBuses'] = $this->availableBusModel->getAvailableBuses($data['from'], $data['to'], $data['date'], $data['count']);

            $this->view('passenger/available_buses', $data);
        }else{
            direct('passenger_book_seats/journey_details');
        }
    }


    public function bus_details(){
        if(isset($_GET['bus_no'], $_GET['schedule_id'], $_GET['booked_seats_id'], $_GET['count'])){
            $data = [
                'bus' => '',
                'bus_rides' => '',
                'driver' => '',
                'conductor' => '',
                'schedule_id' => $_GET['schedule_id'],
                'booked_seats_id' => $_GET['booked_seats_id'],
                'count' => $_GET['count']
            ];

            $data['bus'] = $this->busModel->getBusDetails($_GET['bus_no']);
            $data['bus_rides'] = $this->busModel->getRidesCount($_GET['bus_no']);
            $data['driver'] = $this->busModel->getDriverDetails($data['bus']->driver_ntc);
            $data['conductor'] = $this->busModel->getConductorDetails($data['bus']->conductor_ntc);

            $this->view('passenger/bus_details', $data);
        }else{
            direct('passenger_book_seats/journey_details');
        }
    }

    public function select_seats(){
        $this->view('passenger/select_seats');
    }
}