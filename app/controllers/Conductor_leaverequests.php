<?php

class Conductor_leaverequests extends Controller
{

    private $requestModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            direct('users/login');
        }

        $this->requestModel = $this->model('m_conductor_leaverequests');
    }

    public function add_leaverequests()
    {

        $new =  $this->requestModel->find_bus();
        $bus_no = $new->bus_no;
        $data1 =  $this->requestModel->view_incomerecords($bus_no);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = [
                'date_from' => $_POST['date_from'],
                'date_to' => $_POST['date_to'],
                'reason' => $_POST['reason'],

            ];


            if ($this->requestModel->add_leaverequests($data)) {
                direct('conductor_leaverequests/add_leaverequests');
            } else {
                die('Sorry! Something went wrong');
            }
        } 
        
        else {
            // intialize default values
            $data = [
                'date_from' => '',
                'date_to' => '',
                'reason' => '',

            ];

            // load the view
            $this->view('conductor/view_leaverequests', $data, $data1);
        }
    }

  
}
