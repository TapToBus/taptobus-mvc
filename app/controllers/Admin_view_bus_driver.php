<?php

class Admin_view_bus_driver extends Controller{

    private $pagesModel;

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
        
        $this->pagesModel = $this->model('M_Admin_bus_driver_details');
        
    }

    public function index(){

    }

    public function view_bus_driver(){
        $drivers = $this->pagesModel->getdrivers();

        $data = [
            'drivers' => $drivers
        ];

        $this->view('admin/view_bus_driver', $data);
    }

    // public function view_bus_driver(){
    //     $this->view('admin/view_bus_driver');
    // }
}
?>