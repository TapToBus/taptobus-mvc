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

        $this->view('passenger/profile', $data);
    }


    public function edit_profile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            // $data = [
            //     'pic' => '',
            //     'fname' => '',
            //     'lname' => '',
            //     'curr_pwd' => '',
            //     'new_pwd' => '',
            //     'confirm_pwd' => '',
            //     'fname_err' => '',
            //     'lname_err' => '',
            //     'curr_pwd_err' => '',
            //     'new_pwd_err' => '',
            //     'confirm_pwd_err' => ''
            // ];


            // // set profile pic

            // if(! empty($_POST['pic'])){
            //     $data['pic'] = $_POST['pic'];
            // }else{
            //     $passenger = $this->profileModel->getPassengerDetails($_SESSION['user_id']);
            //     $data['pic'] = $passenger->pic;
            // }


            // // set fname / validate fname

            // $data['fname'] = $_POST['fname'];

            // if(! preg_match("/^[a-zA-Z]+$/", $data['fname']) || strlen($data['fname']) < 3){
            //     $data['fname_err'] = "A valid first name is required";
            // }


            // // set lname / validate lname

            // $data['lname'] = $_POST['lname'];

            // if(! preg_match("/^[a-zA-Z]+$/", $data['lname']) || strlen($data['lname']) < 3){
            //     $data['lname_err'] = "A valid last name is required";
            // }

        }else{
            // $data = [
            //     'pic' => '',
            //     'fname' => '',
            //     'lname' => '',
            //     'curr_pwd' => '',
            //     'new_pwd' => '',
            //     'confirm_pwd' => '',
            //     'fname_err' => '',
            //     'lname_err' => '',
            //     'curr_pwd_err' => '',
            //     'new_pwd_err' => '',
            //     'confirm_pwd_err' => ''
            // ];

            // $data['details'] = $this->profileModel->getPassengerDetails($_SESSION['user_id']);

            // $this->view('passenger/edit_profile', $data);
        }
    }
}