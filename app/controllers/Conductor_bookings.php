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

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

       $input = $_POST['code'];
       $data = $this->newModel->check_bookings($input);
       $this->view('conductor/check_bookings',$data);

     }

     else{

      $this->view('conductor/check_bookings');

     }
   }


}

?>