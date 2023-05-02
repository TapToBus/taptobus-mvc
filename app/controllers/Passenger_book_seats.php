<?php

class Passenger_book_seats extends Controller{
    private $availableBusModel;
    private $busModel;
    private $scheduleModel;
    private $driverModel;
    private $conductorModel;
    private $seatModel;


    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->availableBusModel = $this->model('m_passenger_book_seats');
        $this->busModel = $this->model('m_passenger_book_seats');
        $this->scheduleModel = $this->model('m_passenger_book_seats');
        $this->driverModel = $this->model('m_passenger_book_seats');
        $this->conductorModel = $this->model('m_passenger_book_seats');
        $this->seatModel = $this->model('m_passenger_book_seats');
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


            if(empty($data['from_err']) && empty($data['to_err']) 
                &&  empty($data['date_err']) && empty($data['count_err'])){        

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
                'availableBuses' => $this->availableBusModel->getAvailableBuses($_GET['from'], $_GET['to'], $_GET['date'], $_GET['count'])
            ];

            $this->view('passenger/available_buses', $data);
        }else{
            direct('passenger_book_seats/journey_details');
        }
    }


    public function bus_details(){
        if (isset($_GET['sch_id'], $_GET['boks_id'], $_GET['count'])) {
            $data = [
                'sch_id' => $_GET['sch_id'],
                'boks_id' => $_GET['boks_id'],
                'count' => $_GET['count'],
                'bus' => '',
                'bus_rides' => '',
                'driver' => '',
                'conductor' => ''
            ];

            $row = $this->scheduleModel->getBusNo($data['sch_id']);

            $data['bus'] = $this->busModel->getBusDetails($row->bus_no);
            $data['bus_rides'] = $this->busModel->getRidesCount($row->bus_no);

            $data['driver'] = $this->driverModel->getDriverDetails($data['bus']->driver_ntc);
            $data['conductor'] = $this->conductorModel->getConductorDetails($data['bus']->conductor_ntc);


            $this->view('passenger/bus_details', $data);
        } else {
            direct('passenger_book_seats/journey_details');
        }
    }


    public function select_seats(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'sch_id' => $_POST['sch_id'],
                'boks_id' => $_POST['boks_id'],
                'count' => $_POST['count'],
                'bus' => '',
                'seats' => '',
                'err' => ''
            ];

            $busNo = $this->scheduleModel->getBusNo($data['sch_id']);

            $data['bus'] = $this->busModel->getBusDetails($busNo->bus_no);
            $data['seats'] = $this->scheduleModel->getBookedSeatsDetails($data['boks_id']);

            $i = 1;
            while ($i <= $data['count']) {
                $selected['seat' . $i] = $_POST['choice' . $i];
                $i++;
            }

            // check if there are any element in $selected is equal to 'default'
            /*if(in_array('default', $selected)){
                $data['err'] = 'You must select ' . $data['count'] . ' seats';

                $this->view('passenger/select_seats', $data);
            }else{
                if($this->seatModel->markSeats($data['boks_id'], $selected, $data['count'])){
                    echo 'Ok';
                }else{
                    echo 'Sorry! something went wrong';
                }
            }*/

            
            //check if there are any element in $selected is equal to 'default'
            if(in_array('default', $selected)){
                $data['err'] = 'You must select ' . $data['count'] . ' seats';
            }

            // check if there is error or not
            if(empty($data['err'])){
                if($this->seatModel->markSeats($data['boks_id'], $selected, $data['count'])){
                    echo 'Ok';
                }else{
                    echo 'Sorry! something went wrong';
                }
            }else{
                $this->view('passenger/select_seats', $data);
            }
        }else{
            if(isset($_GET['sch_id'], $_GET['boks_id'], $_GET['count'])){
                $data = [
                    'sch_id' => $_GET['sch_id'],
                    'boks_id' => $_GET['boks_id'],
                    'count' => $_GET['count'],
                    'bus' => '',
                    'seats' => '',
                    'err' => ''
                ];

                $busNo = $this->scheduleModel->getBusNo($data['sch_id']);

                $data['bus'] = $this->busModel->getBusDetails($busNo->bus_no);
                $data['seats'] = $this->scheduleModel->getBookedSeatsDetails($data['boks_id']);
                
                $this->view('passenger/select_seats', $data);
            }else{
                direct('passenger_book_seats/journey_details');
            }
        }
    }


    public function payment(){
        $this->view('passenger/payment');
    }
}