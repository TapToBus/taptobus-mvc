<?php

class Conductor_bookings extends Controller{

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login');
    }
    }

    public function view_dashboard(){
      
      $this->view('conductor/view_dashboard');
    }
}

?>