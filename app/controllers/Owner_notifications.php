<?php

class Owner_notifications extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_notifications');
 
    }

    public function view_conductors(){

        $data = $this->ownerModel->view_conductors();
        $this->view('owner/view_conductors',$data);

    
    }


}

?>