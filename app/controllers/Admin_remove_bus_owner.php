<?php
class Admin_remove_bus_owner extends Controller{

    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function view_remove_bus_owner(){
        $this->view('admin/remove_bus_owner');
    }
}
?>