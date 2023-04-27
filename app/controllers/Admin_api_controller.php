<?php

class Admin_api_controller extends Controller{

    private $adminDoughnutModel;

    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
             direct('user/logout');  
        }

        $this->adminDoughnutModel =$this->model('M_Admin_dashboard');
        
    }

    public function adminDoughnutChart(){
        $userCount = $this->adminDoughnutModel->getUserChartCount();        
        //convert php and jason data to transfer
        echo json_encode($userCount);
    }
}
?>