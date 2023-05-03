<?php

class Passenger_notifications extends Controller{
    private $notificationModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->notificationModel = $this->model('m_passenger_notifications');
    }

    
    public function notifications(){
        $data = $this->notificationModel->getNotifications();
        $this->view('passenger/notifications', $data);
    }
}