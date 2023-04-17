<?php
class Admin_remove_user_dashboard extends Controller{

    private $pageModelReStaffMember;
    private $pageModelReBusOwner;

    public function __construct()
    {
        $this->pageModelReStaffMember = $this->model('M_Admin_staff_member_details');
        $this->pageModelReBusOwner = $this->model('M_Admin_remove_bus_owner');
        
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

    //reser function of staff member

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
}
?>