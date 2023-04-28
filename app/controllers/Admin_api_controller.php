<?php

class Admin_api_controller extends Controller{

    private $adminDoughnutModel;
    private $adminNewUserModel;
    private $adminNewUserPassengerModel;
    private $adminNewBusModel;

    private $adminProfitModel;

    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
             direct('user/logout');  
        }

        $this->adminDoughnutModel =$this->model('M_Admin_dashboard');

        $this->adminNewUserModel =$this->model('M_Admin_dashboard');

        $this->adminNewUserPassengerModel =$this->model('M_Admin_dashboard');

        $this->adminNewBusModel =$this->model('M_Admin_dashboard');

        $this->adminProfitModel =$this->model('M_Admin_dashboard');
        
    }

    public function adminDoughnutChart(){
        $userCount = $this->adminDoughnutModel->getUserChartCount();        
        //convert php and jason data to transfer
        echo json_encode($userCount);
    }

    public function adminNewUserLineChart(){
        $userAddData = $this->adminNewUserModel->getUserAddDateChart();
        //convert php and jason data to transfer
        echo json_encode($userAddData);
    }

    public function adminNewPassengerLineChart(){
        $passengerAddData = $this->adminNewUserPassengerModel->getPassengerAddDateChart();
        //convert php and jason data to transfer
        echo json_encode($passengerAddData);
    }

    public function adminNewBusLineChart(){
        $busAddData = $this->adminNewBusModel->getbusAddDateChart();
        //convert php and jason data to transfer
        echo json_encode($busAddData);
    }

    public function adminProfitLineChart(){
        $profitData = $this->adminProfitModel->getProfit();
        //convert php and jason data to transfer
        echo json_encode($profitData);
    }


}
?>