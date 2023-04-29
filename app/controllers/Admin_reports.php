<?php

class Admin_reports extends Controller{

    public function __construct()
    {
        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');
        }
        
    }

    public function index(){

    }

    //view admin report page
    
    public function view_admin_reports(){
        $this->view('admin/reports');
    }
}


?>