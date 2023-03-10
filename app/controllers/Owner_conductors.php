<?php

class Owner_conductors extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_conductors');
 
    }

    public function view_conductors(){

        $data = $this->ownerModel->view_conductors();
        $this->view('owner/view_conductors',$data);

    
    }

    public function conductor_details(){

        $con_id = $_GET['con_id'];
        $data = $this->ownerModel->conductor_details($con_id);
        $this->view('owner/conductor_details',$data);
    }


}

?>