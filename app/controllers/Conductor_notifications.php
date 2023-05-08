<?php

class Conductor_notifications extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_conductor_notifications');
 
    }

    public function view_notifications(){

        $data = $this->ownerModel->getNotifications();
        $this->view('conductor/view_notifications',$data);
    }
}

?>