<?php
class Admin_remove_bus_conductor extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function view_remove_bus_conductor(){

        $this->view('admin/remove_bus_conductor');

    }
}

?>