<?php

class Owner_leaverequests extends Controller{

    private $ownerModel;
    private $ownerModel1;
    private $ownerModel2;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->ownerModel = $this->model('m_owner_leaverequests');
        $this->ownerModel1 = $this->model('m_owner_buses');
        $this->ownerModel2 = $this->model('m_owner_notifications');
    }

    public function view_leaverequests(){

        $data = $this->ownerModel->view_leaverequests();
        $this->view('owner/view_leaverequests',$data);

    
    }

    public function request_details(){
        
        $user_ntc = $_GET['user_ntc'];
        $data = $this->ownerModel->request_details($user_ntc);
        $this->view('owner/request_details',$data);
    }

    public function update_assigned_bus(){
        
        $user_ntc = $_GET['user_ntc'];
        $type     = $_GET['type'];

        $data = $this->ownerModel->update_assigned_bus($user_ntc,$type);
        $bus_no = $data->bus_no;
        $this->remove_leaverequest($user_ntc,$bus_no);
        
    }

    public function remove_leaverequest($user_ntc,$bus_no){
       
        $this->ownerModel->remove_leaverequest($user_ntc);
        $data = $this->ownerModel1->bus_details($bus_no);
        $this->view('owner/bus_details',$data); 
    }

    public function change_conductor_noti($bus_no){

        $this->ownerModel2->change_conductor_noti($bus_no);
    }

}

?>