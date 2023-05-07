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
            // get total no of accepted requests
            $Acceptdatacounts = [
                'acceptOwners' => $this->profileModel->acceptedOwnerReq(),
                'acceptConductor' => $this->profileModel->acceptedConductorReq(),
                'acceptDriver' => $this->profileModel->acceptedDriverReq(),
                'acceptBus' => $this->profileModel->acceptedBusReq()
            ];

            $Acceptsum = array_sum($Acceptdatacounts);
           
            // get the total no of rejected requests
            $Rejectdatacounts = [
                'rejectOwners' => $this->profileModel->rejectedOwnerReq(),
                'rejectConductor' => $this->profileModel->rejectedConductorReq(),
                'rejecttDriver' => $this->profileModel->rejectedDriverReq(),
                'rejecttBus' => $this->profileModel->rejectedBusReq()
            ];
            $Rejectsum = array_sum($Rejectdatacounts);

            // passes staff info, request accept and reject counts.
            $data = [
                'profile' => $this->profileModel->getStaffdetails($staff_no),
                'TotalAccept' => $Acceptsum,
                'TotalReject' => $Rejectsum            
            ];
            $this->view('staff/staff_profile',$data);
        }

    }
?>