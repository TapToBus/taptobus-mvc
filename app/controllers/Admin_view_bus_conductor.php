<?php

class Admin_view_bus_conductor extends Controller{

    private $pagesModel;

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
        
        $this->pagesModel = $this->model('M_Admin_bus_conductor_details');
    }

    public function index(){

    }

    public function view_bus_conductor(){

        $conductors = $this->pagesModel->getconductors();

        $data = [
            'conductors'=> $conductors
        ];

        $this->view('admin/view_bus_conductor',$data);
    }
}

?>