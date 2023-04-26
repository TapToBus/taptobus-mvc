<?php
class Admin_dashboard extends Controller{

    private $pageModelUserCount ;
    private $pageModelPassengerCount;
    private $pageModelOwnerCount;
    private $pageModelBusCount;

    public function __construct()
    {
        $this->pageModelUserCount = $this->model('M_Admin_dashboard');
        $this->pageModelPassengerCount = $this->model('M_Admin_dashboard');
        $this->pageModelOwnerCount = $this->model('M_Admin_dashboard');
        $this->pageModelBusCount = $this->model('M_Admin_dashboard');

        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');  
        }
        
    }

    public function view_admin_dashboard(){

        //get all user count
        $data= $this->pageModelUserCount->get_user_count();

        //get all passenger count
        $data2=$this->pageModelPassengerCount->get_passenger_count();

        //get all owner count
        $data3=$this->pageModelOwnerCount->get_owner_count();

        //get all bus count
        $data4=$this->pageModelBusCount->get_bus_count();

        

        $data = [
            'user_count' => $data->user_count,
            'passenger_count'=>$data2->passenger_count,
            'owner_count'=>$data3->owner_count,
            'bus_count'=>$data4->bus_count
        ];

        $this->view('admin/view_dashboard', $data);

    }
}

?>