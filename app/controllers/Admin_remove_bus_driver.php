<?php

class Admin_remove_bus_driver extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function view_remove_bus_driver(){

        $this->view('admin/remove_bus_driver');
    }
}

?>