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
        // $data1 = $this->profileModel->getPassengerDetails($_SESSION['user_id']);
        // print_r($data1);

        // echo '<br><br>';

        // $data2 = $this->profileModel->getJourneysCount($_SESSION['user_id']);
        // echo $data2;

        // echo '<br><br>';

        // $data3 = $this->profileModel->getCancellationsCount($_SESSION['user_id']);
        // echo $data3;


        // echo '<br><br>';

        // $data5 = $this->profileModel->getUpcomingJourney($_SESSION['user_id']);
        // print_r($data5);

        $data = [
            'profile' => $this->profileModel->getPassengerDetails($_SESSION['user_id']),
            'journeysCount' => $this->profileModel->getJourneysCount($_SESSION['user_id']),
            'cancelCount' => $this->profileModel->getCancellationsCount($_SESSION['user_id']),
            'upcomingJourney' => $this->profileModel->getUpcomingJourney($_SESSION['user_id'])
        ];

        // echo $data['profile'];

        //$this->view('passenger/profile', $data);
    }
}