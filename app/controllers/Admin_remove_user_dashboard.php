<?php
class Admin_remove_user_dashboard extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function remove_user_dashboard(){
        $this->view('admin/remove_user_dashboard');
    }
}
?>