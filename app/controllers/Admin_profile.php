<?php

class admin_profile extends Controller{

    private $adminProfileModel;

    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
             direct('user/logout');  
        }

        $this->adminProfileModel->model('M_admin_profile');
        
    }

    public function view_profile(){
        

    }
}


?>