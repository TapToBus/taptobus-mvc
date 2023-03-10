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
            // print_r($data);
            // die();
            $this->view('staff/bus_requests_details',$data);
        }


    }
?>