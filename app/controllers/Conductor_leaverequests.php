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

        $new =  $this->requestModel->get_user_details();
        $user_ntc = $new->ntcNo;
        $data1 =  $this->requestModel->view_leaverequests($user_ntc);


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
