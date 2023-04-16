<?php

class Conductor_incomerecords extends Controller{

    private $recordModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->recordModel = $this->model('m_conductor_incomerecords');
         
    }

    public function add_incomerecords(){

        $data = $this->recordModel->view_incomerecords();
        $this->view('conductor/view_incomerecords',$data);
    
    }

    public function view_incomerecords(){

        $data = $this->recordModel->view_incomerecords();
        $this->view('conductor/view_incomerecords',$data);
    
    }


}

?>