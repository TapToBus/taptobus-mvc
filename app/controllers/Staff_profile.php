<?php 
    class staff_profile extends Controller{
        private $profileModel;

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }
            $this->profileModel = $this->model('M_staff_profile');
        }


        public function viewprofile(){
            $staff_no = $_SESSION['user_id'];
            $datacounts = [
                'acceptOwners' => $this->profileModel->acceptedOwnerReq(),
                'acceptConductor' => $this->profileModel->acceptedConductorReq(),
                'acceptDriver' => $this->profileModel->acceptedDriverReq(),
                'acceptBus' => $this->profileModel->acceptedBusReq()
            ];

            $sum = array_sum($datacounts);
            // print_r($sum);
            // die();

            $data = [
                'profile' => $this->profileModel->getStaffdetails($staff_no),
                'TotalAccept' => $sum               
            ];
            $this->view('staff/staff_profile',$data);
        }

    }
?>