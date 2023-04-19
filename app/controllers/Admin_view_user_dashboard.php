<?php
class Admin_view_user_dashboard extends Controller{

    private $pagesModelPassengers;
    private $pagesModelBuses;
    private $pagesModelStaffMembers;
    private $pagesModelBusOwners;
    private $pagesModelBusDrivers;
    private $pagesModelBusConductors;

    public function __construct()
    {
        $this->pagesModelPassengers = $this->model('M_Admin_passenger_details');
        $this->pagesModelBuses = $this->model('M_Admin_bus_details');
        $this->pagesModelStaffMembers = $this->model('M_Admin_staff_member_details');
        $this->pagesModelBusOwners = $this->model('M_Admin_bus_owner_details');
        $this->pagesModelBusDrivers = $this->model('M_Admin_bus_driver_details');
        $this->pagesModelBusConductors = $this->model('M_Admin_bus_conductor_details');
        
    }

    public function index(){

    }

    // view users dashboard

    public function view_user_dashboard(){
        $this->view('admin/view_users');
    }

    // view passenger page

    public function view_passenger (){

        $passengers = $this->pagesModelPassengers->getpassengers();

        $data = ['passengers' => $passengers];

        $this->view('admin/view_passenger',$data);
    }

    // view bus page

    public function view_bus(){
        $buses = $this->pagesModelBuses->getbuses();

        $data = ['buses' => $buses];

        $this->view('admin/view_bus', $data);
    }

    //view staff member page

    public function view_staff_member(){

        $staffmembers = $this->pagesModelStaffMembers->getstaffmembers();
        
        $data = ['staffmembers' => $staffmembers];

        $this->view('admin/view_staff_member', $data);
    }

    //view bus owner page

    public function view_bus_owner(){
            
        $owners = $this->pagesModelBusOwners->getowners();

        $data = ['owners' => $owners];

        $this->view('admin/view_bus_owner', $data);

    }

    //view bus driver page

    public function view_bus_driver(){
        $drivers = $this->pagesModelBusDrivers->getdrivers();

        $data = ['drivers' => $drivers];

        $this->view('admin/view_bus_driver', $data);
    }


    //view bus conductor page

    public function view_bus_conductor(){
        $conductors = $this->pagesModelBusConductors->getconductors();
        $data = ['conductors'=> $conductors];
        $this->view('admin/view_bus_conductor',$data);
    }

    //delete bus conductor from users

    public function delete_bus_conductor(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['deleteBusConductorBtn'])){
                $ntcNo = $_POST['deleteBusConductorBtn'];
                $response = $this->pagesModelBusConductors->deleteconductors($ntcNo);
                $this->view_bus_conductor();
            }
        }
    }






}
?>