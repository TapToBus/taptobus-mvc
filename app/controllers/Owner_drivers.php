<?php

class Owner_drivers extends Controller{

    private $ownerModel;
    private $requestModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_drivers');
          $this->requestModel = $this->model('m_owner_driver_requests');
         
    }

    public function view_drivers(){

        $data = $this->ownerModel->view_drivers();
        $this->view('owner/view_drivers',$data);
    
    }

    public function driver_details(){

        $dr_id = $_GET['dr_id'];
        $data = $this->ownerModel->driver_details($dr_id);
        $this->view('owner/driver_details',$data);
    }
 
    public function register_driver(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // initialize data
            $data = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'nic' => $_POST['nic'],
                'ntcNo' => $_POST['ntcNo'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'dob' => $_POST['dob'],
                'address' => $_POST['address'],
               
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'ntcNo_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'dob_err' => '',
                'address_err' => '',
               
                
            ];
 
            // validate

            // validate first name
            if(! preg_match("/^[a-zA-Z]+$/", $data['fname']) || strlen($data['fname']) < 3){
                $data['fname_err'] = "A valid first name is required";
            }

            // validate last name
            if(! preg_match("/^[a-zA-Z]+$/", $data['lname']) || strlen($data['lname']) < 3){
                $data['lname_err'] = "A valid last name is required";
            }

            // validate nic
            if((strlen($data['nic']) == 10 && ! preg_match("/^[0-9]{9}[V]+$/", $data['nic'])) ||
                (strlen($data['nic']) == 12 && ! preg_match("/^[0-9]{12}+$/", $data['nic'])) ||
                strlen($data['nic']) < 10){
                
                $data['nic_err'] = "A valid NIC no is required";
            }else{
                if($this->ownerModel->findDrByNIC($data['nic'])){
                    $data['nic_err'] = 'NIC is already taken';
                }
            }

             //validate ntcNo
             if(! preg_match('/^C\d{5}$/', $data['ntcNo'])){
                $data['ntcNo_err'] = 'A valid NTC No is required';
            }
            else{
                if($this->ownerModel->findDrByNtcNo($data['ntcNo'])){
                    $data['ntcNo_err'] = 'ntc no is already taken';
                }
            }


            //validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }else{
                if($this->ownerModel->findDrByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate mobile no
            if(! preg_match('/^[0-9]{10}+$/', $data['mobileNo'])){
                $data['mobileNo_err'] = 'A valid mobile no is required';
            }
            else{
                if($this->ownerModel->findDrByMobileNo($data['mobileNo'])){
                    $data['mobileNo_err'] = 'Mobile no is already taken';
                }
            }


            // validate checkbox
            if(empty($_POST['agree'])){
                $data['agree_err'] = 'Checking checkbox is required';
            }

            // make sure errors are empty
            if( empty($data['fname_err']) && empty($data['lname_err']) && 
            empty($data['nic_err']) && empty($data['ntcNo_err']) && empty($data['email_err']) && 
            empty($data['mobileNo_err']) && empty($data['dob_err']) && empty($data['address_err'])){
                

                // register driver
                if( $this->ownerModel->register($data) && $this->requestModel->add_dr_request($data) ){
                    direct('users/login');
                   
                }else{
                    die('Sorry! Something went wrong');
                }

            }else{
                // load view with errors
                $this->view('owner/dr_register', $data);
            
            }
        }
        else{
            // initialize default values
            $data = [
                'fname' => '',
                'lname' => '',
                'nic' => '',
                'ntcNo' => '',
                'email' => '',
                'mobileNo' => '',
                'dob' => '',
                'address' => '',
                'agree' => '',
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'ntcNo_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'dob_err' => '',
                'address_err' => '',
                'agree_err' => '',
                
            ];

            // load the view with the default data
            $this->view('owner/dr_register', $data);
        }
    }



}

?>