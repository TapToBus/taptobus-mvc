<?php
    class Staff_view_requests extends Controller{
        private $ownerModel;
        private $driverModel;
        private $conductorModel;
        private $busModel;

        public function __construct()
        {     if(! isLoggedIn()){
            direct('users/login');
            }       
            
            $this->ownerModel = $this->model("M_staff_requests");
            $this->driverModel = $this->model("M_staff_requests");
            $this->conductorModel = $this->model("M_staff_requests");
            $this->busModel = $this->model("M_staff_requests");            
        }

       

        public function owner_requests(){
            $this->view('staff/owner_requests');

        }

        public function driver_requests(){
            $this->view('staff/driver_requests');
        }

        public function conductor_requests(){
            $this->view('staff/conductor_requests');
        }

        public function bus_requests(){            
            $busRequests = $this->busModel->busRequests();
            $data = ['busRequests' => $busRequests];
            $this->view('staff/bus_requests' , $data);
        }

// view requests details


        public function owner_requests_details(){
            $this->view('staff/owner_requests_details');
        }

        
        public function driver_requests_details(){
            $this->view('staff/driver_requests_details');
        }

        
        public function conductor_requests_details(){
            $this->view('staff/conductor_requests_details');
        }


        public function bus_requests_details(){
            $bus_no = $_GET['bus_no'];          
            
            $busRequestDetails = $this->busModel->busRequestedDetails($bus_no);
            $data = [
                'busRequestDetails' => $busRequestDetails
            ];
            $this->view('staff/bus_requests_details',$data);
        }
    
// Accept requests by relavent staff member

        public function accept_bus_requests(){
           
            $bus_no = $_GET['bus_no'];
            $staff_no = $_SESSION['user_id'];

            $data = [
                'bus_no' => $bus_no,
                'status' => 'accepted'
            ]; 

            $this->busModel->accept_bus_request($data);  
            
            // get the owner id from for the relavent bus number
            $bus_details = $this->busModel->busRequestedDetails($bus_no);
            $data = [
                'bus_details' => $bus_details
            ];

            // print_r($data); | Array ( [bus_details] => stdClass Object ( [bus_no] => AV-9876 [root_no] => E10 [capacity] => 60 [owner_nic] => 656783425V ) )
            // die();
            $owner_nic = $data['bus_details']->owner_nic;

          
            $data2 = [
                'owner_nic' => $owner_nic,
                'staff_no' => $staff_no ,
                'status' => 'accepted'               
            ];

            // print_r($data2);  | Array ( [owner_nic] => 656783425V [staff_no] => staff001 )
            // die();
            
            
            $x = $this->busModel->update_staff_id($data2);
            // print_r($x);
            // die();

            direct('Staff_view_requests/bus_requests');//we cant use view here bcz we are not passing any data to render the relavent page

            // if you want to render the details page with the requested data you should pass the it to the direct page
            // direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);

        }


    }
?>