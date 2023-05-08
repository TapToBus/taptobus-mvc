<?php

class Driver_schedule extends Controller{

    private $scheduleModel;

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login'); 
    }

      $this->scheduleModel = $this->model('m_driver_schedule');
    }

    public function view_schedule(){
      
      $new =  $this->scheduleModel->find_bus_no();  
      $bus_no = $new->bus_no;
      $data = $this->scheduleModel->view_schedule($bus_no);
      $this->view('driver/view_schedule',$data);
    }
}

?>