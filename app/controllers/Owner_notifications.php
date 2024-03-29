<?php

class Owner_notifications extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_notifications');
 
    }

    public function view_notifications(){

        $data = $this->ownerModel->getNotifications();
        $this->view('owner/view_notifications',$data);
    }
}

?>