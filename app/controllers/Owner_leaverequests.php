<?php

class Owner_leaverequests extends Controller{

    // private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        // $this->ownerModel = $this->model('m_owner_conductors');

    }

    public function view_leaverequests(){

        // $data = $this->ownerModel->view_conductors();
        $this->view('owner/view_leaverequests');

    
    }

    public function request_details(){
        $this->view('owner/request_details');
    }

}