<?php

class Conductor_bookings extends Controller{

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login');
    }
    }

    public function check_bookings(){
      
      $this->view('conductor/check_bookings');
      echo(1);
    }

    
}

?>