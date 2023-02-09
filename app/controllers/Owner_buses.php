<?php

class Owner_buses extends Controller{

    private $ownerModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->ownerModel = $this->model('m_owner_buses');

    }

    public function add_bus(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // intialize data
            $data = [
                'bus_no' => $_POST['bus_no'],
                'root_no' => $_POST['root_no'],
                'owner_name' => $_POST['owner_name'],
                
            ];

            if($this->ownerModel->add_bus($data)){
                direct('owner_buses/view_buses');
            }
            else{
                die('Sorry! Something went wrong');
            }
        }
        
        else{
            // intialize default values
            $data = [
                'bus_no' => '',
                'root_no' => '',
                'owner_name' => '',
                'pic' => '',
                'nic' => '',
            
            ];

            // load the view
            $this->view('owner/add_bus', $data);
        }
    }

    public function view_buses(){

        $data = $this->ownerModel->view_buses();
        $this->view('owner/view_buses', $data);

        // if($data){
        //     return $data;
        // }else{
        //     return false;
        // }
    }

    public function bus_details(){
        $this->view('owner/bus_details');
    }

}