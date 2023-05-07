<?php

class Owner_dashboard extends Controller{

    private $ownerModel;
    private $busModel;

    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login');
    }
      $this->ownerModel = $this->model('m_conductor_incomerecords');
      $this->busModel = $this->model('m_owner_buses');
    }

  

    public function view_dashboard(){
      

      $data = $this->ownerModel->view_incomerecords_forbusses();
      $Noofbus = $this->busModel->count_of_buses();
      $data1['bus_count'] = $Noofbus->count;
      $Noofcon = $this->busModel->count_of_conductors();
      $data1['con_count'] = $Noofcon;
      $Noofdr = $this->busModel->count_of_drivers();
      $data1['dr_count'] = $Noofdr;
    
      $this->view('owner/view_dashboard',$data,$data1);
    }
}
