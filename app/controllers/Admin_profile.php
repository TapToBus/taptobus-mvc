<?php

class admin_profile extends Controller{

    private $profileModel;


    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
             direct('user/logout');  
        }

        $this->profileModel = $this->model('M_Admin_profile');

    }

    public function view_profile(){
        
        $ProfileDetails = $this->profileModel->getProfileDetails($_SESSION['user_id']);

        $data = [
            'ProfileDetails' => $ProfileDetails
        ];

        $this->view('admin/view_profile', $data);
        

    }
}


?>