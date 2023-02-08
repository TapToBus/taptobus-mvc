<?php

class Admin_view_staff_member extends Controller{

    private $pagesModel;

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
        
        $this->pagesModel = $this->model('M_Admin_staff_member_details');
    }

    public function index(){

    }

    public function view_staff_member(){

        $staffmembers = $this->pagesModel->getstaffmembers();
        
        $data = [
            'staffmembers' => $staffmembers
        ];

        $this->view('admin/view_staff_member', $data);
    }



    // public function view_staff_membe(){
    //     $this->view('admin/view_staff_member');
    // }
}

?>