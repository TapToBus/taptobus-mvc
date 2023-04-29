<?php

class Owner_leaverequests extends Controller{

    private $ownerModel;
    private $ownerModel1;
    private $ownerModel2;
    private $ownerModel3;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->ownerModel = $this->model('m_owner_leaverequests');
        $this->ownerModel1 = $this->model('m_owner_buses');
        $this->ownerModel2 = $this->model('m_owner_notifications');
        $this->ownerModel3 = $this->model('m_owner_conductors');
    }

    public function view_leaverequests(){

        $data = $this->ownerModel->view_leaverequests();
        $this->view('owner/view_leaverequests',$data);

    
    }

    public function request_details(){
        
        $request_id = $_GET['request_id'];
        $data = $this->ownerModel->request_details($request_id);
        $this->view('owner/request_details',$data);
    }

    public function update_assigned_bus(){
        
        $user_ntc = $_POST['user_ntc'];
        $type     = $_POST['type'];
        $owner_nic     = $_POST['owner_nic'];
        $heading    = $_POST['heading'];
        $description     = $_POST['description'];

        $data = $this->ownerModel->update_assigned_bus($user_ntc,$type);
        $bus_no = $data->bus_no;
        $this->create_assign_con_notification($user_ntc,$bus_no,$owner_nic,$heading,$description);
        
    }

    public function create_assign_con_notification($user_ntc,$bus_no,$owner_nic,$heading,$description){
         
        $this->ownerModel2->create_assign_con_notification($owner_nic,$heading,$description);
        $this->remove_leaverequest($user_ntc,$bus_no);
    }

    public function remove_leaverequest($user_ntc,$bus_no){
       
        $this->ownerModel->remove_leaverequest($user_ntc);
        $data = $this->ownerModel1->bus_details($bus_no);
        $data1 = $this->ownerModel3->avail_conductors();
        $data2 = $this->ownerModel3->find_conductor_name($bus_no);
        $this->view('owner/bus_details',$data,$data1,$data2); 
    }

    public function reject_leaverequest($request_id,$bus_no){
       
        $this->ownerModel->reject_leaverequest($request_id);
        $data = $this->ownerModel1->bus_details($bus_no);
        $this->view('owner/bus_details',$data); 
    }

}

?>