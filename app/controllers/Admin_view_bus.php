<?php
class Admin_view_bus extends Controller{

    private $pagesModel;

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
        
        $this->pagesModel = $this->model('M_Admin_bus_details');
        
    }
    
    public function index(){

    }

    public function view_bus(){
        $buses = $this->pagesModel->getbuses();

        $data = [
            'buses' => $buses
        ];

        $this->view('admin/view_bus', $data);
    }
}

?>