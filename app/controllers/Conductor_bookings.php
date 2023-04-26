<?php

class Conductor_bookings extends Controller{

    private $newModel;

    public function __construct()

    {
      if(! isLoggedIn()){
        direct('users/login');
    }

      $this->newModel = $this->model('m_conductor_bookings');

    }

    public function check_bookings(){
      
       

    }


}

?>