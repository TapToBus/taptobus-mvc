<?php

class admin_profile extends Controller{

    private $profileModel;


    public function __construct()
    {
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
             direct('user/logout');  
        }

        $this->profileModel = $this->model('M_Admin_profile');

    }

    // public function view_profile(){
        
    //     $ProfileDetails = $this->profileModel->getAdminProfileDetails($_SESSION['user_id']);

    //     $data = [
    //         'ProfileDetails' => $ProfileDetails
    //     ];

    //     $this->view('admin/view_profile', $data);
        

    // }

    public function update_profile($admin_id){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //get the data from array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $ProfileDetails = $this->profileModel->getAdminProfileDetails($_SESSION['user_id']);

            $data = [
                'admin_id' => $ProfileDetails->admin_id,
                'nic' => $ProfileDetails->nic,
                'firstname' => trim($_POST['first_name']),
                'lastname' => trim($_POST['last_name']),
                'email' => $ProfileDetails->email,
                'mobile' => trim($_POST['mobile']),
                'tele' => trim($_POST['tele']),

                'fname_err' => '',
                'lname_err' => '',
                'mobile_err' => '',
                'tele_err' => ''
            ];

            //validate

            //validate first name
            if (!preg_match("/^[a-zA-Z]+$/", $data['firstname']) || strlen($data['firstname']) < 3) {
                $data['fname_err'] = "A valid first name is required";
            }

            //validate last name
            if (!preg_match("/^[a-zA-Z]+$/", $data['lastname']) || strlen($data['lastname']) < 5) {
                $data['lname_err'] = "A valid last name is required";
            }


            //validate mobile number
            if (!preg_match('/^[0-9]{10}+$/', $data['mobile'])) {
                $data['mobile_err'] = 'A valid mobile no is required';
            } else {
                if ($this->profileModel->findAdminByMobileNo($data['mobile'])) {
                    $data['mobile_err'] = 'Mobile no is already taken';
                }
            }

            //validate telephone number
            if (!preg_match('/^[0-9]{10}+$/', $data['tele'])) {
                $data['tele_err'] = 'A valid telephone no is required';
            } else {
                if ($this->profileModel->findAdminByTeleNo($data['tele'])) {
                    $data['tele_err'] = 'telephone no is already taken';
                }
            }

            if (empty($data['fname_err']) && empty($data['lname_err'])  && empty($data['mobile_err']) && empty($data['tele_err'])){

                $this->profileModel->update_profile($data);

                $this->view('admin/view_profile', $data);


                
            } 
            else{
                $this->view('admin/view_profile', $data);
            }
        }
        else{

            $ProfileDetails = $this->profileModel->getAdminProfileDetails($_SESSION['user_id']);

            $data = [
                'admin_id' => $ProfileDetails->admin_id,
                'nic' => $ProfileDetails->nic,
                'firstname' => $ProfileDetails->fname,
                'lastname' => $ProfileDetails->lname,
                'email' => $ProfileDetails->email,
                'mobile' => $ProfileDetails->mobileNo,
                'tele' => $ProfileDetails->telNo,

                'fname_err' => '',
                'lname_err' => '',
                'mobile_err' => '',
                'tele_err' => ''
            ];

            $this->view('admin/view_profile', $data);

        }

    }

}


?>