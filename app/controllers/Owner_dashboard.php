<?php

class Owner_dashboard extends Controller{

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login');
    }
    }

    public function view_dashboard(){
      
      $this->view('owner/view_dashboard');
    }
}