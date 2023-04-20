<?php

class passenger_profile extends Controller{
    private $profileModel;
    

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->profileModel = $this->model('m_passenger_profile');
    }

    
    public function profile(){

        $data = [
            'profile' => $this->profileModel->getPassengerDetails($_SESSION['user_id']),
            'journeysCount' => $this->profileModel->getJourneysCount($_SESSION['user_id']),
            'cancelCount' => $this->profileModel->getCancellationsCount($_SESSION['user_id']),
            'upcomingJourney' => $this->profileModel->getUpcomingJourney($_SESSION['user_id'])
        ];

        // echo $data['profile']->nic;

        $this->view('passenger/profile', $data);
    }


    public function edit_profile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
                'pic' => $_POST['pic'],
                'nic' => $_POST['nic'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'mobile_no' => $_POST['mobile_no']
            ];

            print_r($data);

        }else{
            
            $data = [
                'details' =>  $this->profileModel->getPassengerDetails($_SESSION['user_id'])
            ];


            $this->view('passenger/edit_profile', $data);
        }
    }
}