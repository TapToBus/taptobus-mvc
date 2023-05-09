<?php

class Driver_notifications extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_driver_notifications');
 
    }

    public function view_notifications(){

        $data = $this->ownerModel->getNotifications();
        $this->view('driver/view_notifications',$data);
    }
}

?>