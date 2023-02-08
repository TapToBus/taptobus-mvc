<?php

class Admin_remove_bus extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function view_remove_bus(){
        $this->view('admin/remove_bus');
    }
}
?>