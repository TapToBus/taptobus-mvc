<?php
class Admin_history extends Controller{

    private $PassengerPageModel; 
    // private $BusOwnerPageModel;
    // private $BusPageModel;
    // private $DriverPageModel;
    // private $ConductorPageModel;

    public function __construct()
    {
        $this->PassengerPageModel = $this->model('M_Admin_History');

        
    }

    public function index(){

    }

    public function view_admin_history(){
        $removepassengers = $this->PassengerPageModel->getremovepassenger();

        $data1 = ['removepassengers' => $removepassengers];

        $this->view('admin/admin-history',$data1);


    }
}

?>