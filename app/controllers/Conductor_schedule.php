<?php

class Conductor_schedule extends Controller{

    private $scheduleModel;

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login'); 
    }

      $this->scheduleModel = $this->model('m_conductor_schedule');
    }

    public function view_schedule(){
      
      $new =  $this->scheduleModel->find_bus_no();  
      $bus_no = $new->bus_no;
      var_dump($new);
      $data = $this->scheduleModel->view_schedule($bus_no);
      $this->view('conductor/view_schedule',$data);
    }
}

?>