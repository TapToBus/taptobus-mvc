<?php

class Passenger_history extends Controller{
    private $historyModel;
    
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->historyModel = $this->model('m_passenger_history');
    }

    
    public function history(){
        $data = [
            'history' => $this->historyModel->getHistory($_SESSION['user_id']),
            'fullHistory' => '',
        ];

        // $data1 = ['details' => $this->historyModel->getFullHistory(6)];
        // echo $data1['details']->from;

        $this->view('passenger/history', $data);
    }
}