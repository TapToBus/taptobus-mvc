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

       
// get the pending requests from the model and pass it to the corresponding view
        public function owner_requests(){
            $ownerRequests = $this->ownerModel->ownerRequests();
            $data = ['ownerRequests' => $ownerRequests];
            $this->view('staff/owner_requests' , $data);

        }

        public function driver_requests(){
            $driverRequests = $this->driverModel->driverRequests();
            $data = ['driverRequests' => $driverRequests];
            $this->view('staff/driver_requests', $data);
            
        }

        public function conductor_requests(){
            $conductorReqquests = $this->conductorModel->conductorRequests();
            $data = ['conductorRequests' => $conductorReqquests];
            $this->view('staff/conductor_requests',$data);
            
        }

        public function bus_requests(){            
            $busRequests = $this->busModel->busRequests();
            $data = ['busRequests' => $busRequests];
            // $bus_no = $data['busRequests'][0]->bus_no; // to get date 
            // print_r($bus_no);
            // die();
            $this->view('staff/bus_requests' , $data);
        }

// view requests details


        public function owner_requests_details(){
            $owner_nic = $_GET['nic'];
            $ownerRequestDetails = $this->ownerModel->ownerRequestedDetails($owner_nic);
            $data = [
                    'ownerRequestDetails' => $ownerRequestDetails
            ];
            $this->view('staff/owner_requests_details',$data);
        }

        
        public function driver_requests_details(){
            $driver_nic = $_GET['nic'];
            $driverRequestDetails = $this->driverModel->driverRequestedDetails($driver_nic);
            $data = [
                'driverRequestDetails' => $driverRequestDetails
            ];
            $this->view('staff/driver_requests_details',$data);
        }

        
        public function conductor_requests_details(){
            $conductor_nic = $_GET['nic'];
            $conductorRequestsDetails = $this->driverModel->conductorRequestedDetails($conductor_nic);
            $data = [ 
                    'conductorRequestDetails' => $conductorRequestsDetails
            ];
            $this->view('staff/conductor_requests_details',$data);
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

            $data1 = [
                'bus_no' => $bus_no,
                'status' => 'accepted'
            ]; 

            $this->busModel->accept_bus_request($data1);  
            
            // get the owner id from for the relavent bus number
            $bus_details = $this->busModel->busRequestedDetails($bus_no);
            $data2 = [
                'bus_details' => $bus_details
            ];

            // print_r($data); | Array ( [bus_details] => stdClass Object ( [bus_no] => AV-9876 [root_no] => E10 [capacity] => 60 [owner_nic] => 656783425V ) )
            // die();
            $owner_nic = $data2['bus_details']->owner_nic;

          
            $data3 = [
                'owner_nic' => $owner_nic,
                'staff_no' => $staff_no ,
                'status' => 'accepted' ,
                // 'reject_reason' =>''              
            ];

            // print_r($data2);  | Array ( [owner_nic] => 656783425V [staff_no] => staff001 )
            // die();
            
            
            $x = $this->busModel->update_staff_id($data3);
            // print_r($x);
            // die();

            direct('Staff_view_requests/bus_requests');//we cant use view here bcz we are not passing any data to render the relavent page

            // if you want to render the details page with the requested data you should pass the it to the direct page
            // direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);

        }

// Reject requests by relavent staff member

        public function reject_bus_requests(){

            $bus_no = $_GET['bus_no'];
            $staff_no = $_SESSION['user_id'];

            $data1 = [
                'bus_no' => $bus_no,
                'status' => 'rejected'
            ];

            $this->busModel->reject_bus_requests($data1); // update the bus tabel status

    
            //   ------- check whether the reason is empty or not ------------

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['send'])){
                    if(isset($_POST['reject_reason']) && !empty(trim($_POST['reject_reason']))){  // Check if reject_reason is set and not empty. check the reject_reason is set is not enough

                        // print_r($_POST['reject_reason']);
                        // die();
                        
                        $bus_details = $this->busModel->busRequestedDetails($bus_no);
                        $data2 = [
                            'bus_details' => $bus_details
                        ];

                        $owner_nic = $data2['bus_details']->owner_nic;

                        $data3 = [
                            'owner_nic' => $owner_nic,
                            'staff_no' => $staff_no ,
                            'status' => 'rejected',
                            'reject_reason' =>$_POST['reject_reason']                
                        ];
            
                        $this->busModel->update_staff_id($data3); // update  the status and the staff_no on bus_request table
            
                        direct('Staff_view_requests/bus_requests');


                    }else{
                        echo "Please enter a reason for the rejection";
                    }
                }
                else if(isset($_POST['cancel'])){
                    direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);
                }
            }
          
         

        }

    }
?>