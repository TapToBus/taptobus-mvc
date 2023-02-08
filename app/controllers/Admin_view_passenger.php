<?php

class Admin_view_passenger extends Controller{
    public function __construct()
    {
        if(! isLoggedIn()){
            direct('users/login');
        }
    }

    public function view_passenger (){
        $this->view('admin/view_passenger');
    }
}

?>