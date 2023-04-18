<?php
class Admin_remove_user_dashboard extends Controller{

    private $pageModelReStaffMember;
    private $pageModelReBusOwner;
    private $pageModelReBusConductor;
    private $pageModelReBusDriver;
    private $pageModelReBus;

    public function __construct()
    {
        $this->pageModelReStaffMember = $this->model('M_Admin_staff_member_details');
        $this->pageModelReBusOwner = $this->model('M_Admin_remove_bus_owner');
        $this->pageModelReBusConductor = $this->model('M_Admin_bus_conductor_details');
        $this->pageModelReBusDriver = $this->model('M_Admin_bus_driver_details');
        $this->pageModelReBus = $this->model('M_Admin_bus_details');
        
    }

    public function index(){

    }

    //view user rearrange dashboard

    public function remove_user_dashboard(){
        $this->view('admin/remove_user_dashboard');
    }

    //view staff member rearrange page

    public  function view_remove_staff_member(){
        $removestaff = $this->pageModelReStaffMember->removestaffmembers();
        $data = ['removestaff' => $removestaff];
        $this->view('admin/remove_staff_member',$data);
    }

    //reset function of staff member

    public function reset_staff_member(){
        // check if button and form is work
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // check button pass the value
            if(isset($_POST['removestaffmemberbtn'])){
                $staff_no = $_POST['removestaffmemberbtn'];
                $response = $this->pageModelReStaffMember->reset_staff_member($staff_no);
                $this->view_remove_staff_member();
            }
        }
    }

    // view bus owner rearrange page

    public function view_remove_bus_owner(){

        $removeowners = $this->pageModelReBusOwner->getremoveowner();
        $data = ['removeowners' => $removeowners];
        $this->view('admin/remove_bus_owner',$data);
    }

    //reset function of bus owner

    public function remove_bus_owner(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['removeBusOwnerBtn'])){
                $nic = $_POST['removeBusOwnerBtn'];
                $response = $this->pageModelReBusOwner->remove_bus_owner($nic);
                $this->view_remove_bus_owner();
            }
        }
        
    }

    // view bus conductor rearrage page

    public function view_remove_bus_conductor(){
        $removeconductors = $this->pageModelReBusConductor->removeconductors();
        $data = ['removeconductors' => $removeconductors];
        $this->view('admin/remove_bus_conductor',$data);
    }

    // restore function for the bus conductors

    public function remove_bus_conductor(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['removeBusConductorBtn'])){
                $ntcNo = $_POST['removeBusConductorBtn'];
                $response = $this->pageModelReBusConductor->resetconductors($ntcNo);
                $this->view_remove_bus_conductor();
            }
        }
    }

    //view bus driver rearrange page

    public function view_remove_bus_driver(){
        $removedrivers = $this->pageModelReBusDriver->removedrivers();
        $data =['removedrivers' => $removedrivers];
        $this->view('admin/remove_bus_driver' ,$data); 
       
    }

    //restore function for the bus drivers

    public function remove_bus_driver(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['removeBusDriverBtn'])){
                $ntcNo = $_POST['removeBusDriverBtn'];
                $response = $this->pageModelReBusDriver->resetdrivers($ntcNo);
                $this->view_remove_bus_driver();
            }
        }
    }


}
?>