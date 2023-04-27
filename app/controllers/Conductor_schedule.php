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
      
      $data = $this->scheduleModel->view_schedule();
      $this->view('conductor/view_schedule',$data);
    }
}

?>