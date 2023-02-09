<?php

class Owner_drivers extends Controller{

    // private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        // $this->ownerModel = $this->model('m_owner_conductors');

    }

    public function view_drivers(){

        // $data = $this->ownerModel->view_conductors();
        $this->view('owner/view_drivers');

    
    }

    public function driver_details(){
        $this->view('owner/driver_details');
    }

}