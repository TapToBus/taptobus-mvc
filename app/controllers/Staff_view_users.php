<?php
    class Staff_view_users extends Controller{

        private $ownerModel;
        private $driverModel;
        private $conductorModel;
        private $busModel;

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }    

            $this->ownerModel = $this->model("M_Staff");
            $this->driverModel = $this->model("M_Staff");
            $this->conductorModel = $this->model("M_Staff");
            $this->busModel = $this->model("M_Staff");


        }

        public function view_users(){
            
            $this->view('staff/staffusers');
        }

        // take the user details from the data base and pass to the relavent controller
        public function view_bus_owner(){
            
            $busOwnerdetails = $this->ownerModel->viewOwners(); 
            $data = ['busOwnerdetails' => $busOwnerdetails];
            $this->view('staff/bo_details',$data);

        }

        public function view_driver(){
            $driverdetails = $this->driverModel->viewDrivers();
            // data is object array
            $data = ['driverdetails' => $driverdetails];
            $this->view('staff/d_details', $data);
        }

        public function view_conductor(){
            $conductordetails = $this->conductorModel->viewConductors();
            $data = ['conductordetails' => $conductordetails];
            $this->view('staff/c_details', $data);
        }

        public function view_bus(){
            $busdetails = $this->busModel->viewBuses();
            $data = ['busdetails' => $busdetails];
            $this->view('staff/bus_details', $data);
        }

    }
?>