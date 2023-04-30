<?php

class Owner_dashboard extends Controller{

    private $ownerModel;
    public function __construct()
    {
      if(! isLoggedIn()){
        direct('users/login');
    }
      $this->ownerModel = $this->model('m_conductor_incomerecords');
    }

  

    public function view_dashboard(){
      

      $data = $this->ownerModel->view_incomerecords_forbusses();
      var_dump($data);
      $this->view('owner/view_dashboard',$data);
    }
}

?>