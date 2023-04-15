<?php
class Admin_remove_bus_owner extends Controller{

    private $remove_bus_owner_model;

    public function __construct()
    {
     $this->remove_bus_owner_model = $this->model('M_admin_remove_bus_owner');  
    }

    public function index(){

    }

    public function view_remove_bus_owner(){

        $removeowners = $this->remove_bus_owner_model->getremoveowner();
        $data = ['removeowners' => $removeowners];
        $this->view('admin/remove_bus_owner',$data);
    }

    public function remove_bus_owner(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['removeBusOwnerBtn'])){
                $nic = $_POST['removeBusOwnerBtn'];
                $response = $this->remove_bus_owner_model->remove_bus_owner($nic);
                $this->view_remove_bus_owner();
            }
        }
        
    }
}
?>