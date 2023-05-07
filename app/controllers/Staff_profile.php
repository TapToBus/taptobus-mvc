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
            $data = [
                'profile' => $this->profileModel->getStaffdetails($staff_no),
            ];
            $this->view('staff/staff_profile',$data);
        }

    }
?>