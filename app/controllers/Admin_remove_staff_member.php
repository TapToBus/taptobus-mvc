<?php

class Admin_remove_staff_member extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public  function view_remove_staff_member(){
        $this->view('admin/remove_staff_member');
    }
}

?>