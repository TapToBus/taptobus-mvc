<?php
class Admin_add_staff_member extends Controller{



    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        } 
        
    }

    public function add_staff_member(){

        $this->view('admin/add_new_staff_member');

    }
}

?>