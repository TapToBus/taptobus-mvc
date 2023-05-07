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

      
        // ------------- search user details  from tabels -------------

        public function  searchOwner(){
                        
            if($_SERVER['REQUEST_METHOD']=='GET'){
                 $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
                $search=trim($_GET['search']);            
                $owner= $this->ownerModel->searchOwner($search);
                
                $data=[                      
                    'busOwnerdetails'=>$owner,
                    'search'=>$search
                ];

                $this->view('staff/bo_details',$data);
            }else{
                $data=[                      
                    'busOwnerdetails'=>'',
                    'search'=>''
                ];
                $this->view('staff/bo_details',$data);
            }
        }

        public function  searchConductor(){
                        
            if($_SERVER['REQUEST_METHOD']=='GET'){
            $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
                $search=trim($_GET['search']);            
                $conductor= $this->conductorModel->searchConductor($search);
                
                $data=[                      
                    'conductordetails'=>$conductor,
                    'search'=>$search
                ];

                $this->view('staff/c_details',$data);
            }else{
                $data=[                      
                    'conductordetails'=>'',
                    'search'=>''
                ];
                $this->view('staff/c_details',$data);
            }
        }

        public function  searchDriver(){
                        
            if($_SERVER['REQUEST_METHOD']=='GET'){
            $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
                $search=trim($_GET['search']);            
                $driver= $this->driverModel->searchDriver($search);
                
                $data=[                      
                    'driverdetails'=>$driver,
                    'search'=>$search
                ];

                $this->view('staff/d_details',$data);
            }else{
                $data=[                      
                    'driverdetails'=>'',
                    'search'=>''
                ];
                $this->view('staff/d_details',$data);
            }
        }

        public function  searchBus(){
                        
            if($_SERVER['REQUEST_METHOD']=='GET'){
            $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
                $search=trim($_GET['search']);            
                $bus= $this->busModel->searchBus($search);
                
                $data=[                      
                    'busdetails'=>$bus,
                    'search'=>$search
                ];

                $this->view('staff/bus_details',$data);
            }else{
                $data=[                      
                    'busdetails'=>'',
                    'search'=>''
                ];
                $this->view('staff/bus_details',$data);
            }
       }
    }
?>