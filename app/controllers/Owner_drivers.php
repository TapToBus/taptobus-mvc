<?php

class Owner_drivers extends Controller{

      private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_drivers');

    }

    public function view_drivers(){

        $data = $this->ownerModel->view_drivers();
        $this->view('owner/view_drivers',$data);

    }

    public function driver_details(){
        $data = $this->ownerModel->view_drivers();
        $this->view('owner/driver_details',$data);
    }

}

?>