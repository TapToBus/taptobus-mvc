<?php
class Admin_dashboard extends Controller{

    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');  
        }
        
    }

    public function view_admin_dashboard(){

        $this->view('admin/view_dashboard');

    }
}

?>