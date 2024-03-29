<?php

class Owner_conductors extends Controller{

    private $ownerModel;
    private $requestModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->ownerModel = $this->model('m_owner_conductors');
          $this->requestModel = $this->model('m_owner_conductor_requests');
         
    }

    public function view_conductors(){

        $data = $this->ownerModel->view_conductors();
        $this->view('owner/view_conductors',$data);
    
    }

    public function conductor_details(){

        $con_id = $_GET['con_id'];
        $data = $this->ownerModel->conductor_details($con_id);
        $this->view('owner/conductor_details',$data);
    }
 
    public function register_conductor(){
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
                'con_image' => "",
                
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'ntcNo_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'dob_err' => '',
                'address_err' => '',
               
            ];
 
            // if (!empty($_FILES["con_image"]) && is_uploaded_file($_FILES['con_image']['tmp_name'])) {
            //     // $fileName = "user";
            //     $msg = upload_file("con_image", "owner_img", $data['ntcNo'], ['png', 'jpeg', 'jpg'], 50000000, TRUE, TRUE);
            //     if (!empty($msg)) {
            //         $image = "";
            //     } else {
            //         $target_file = basename($_FILES["con_image"]["name"]);
            //         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            //         $image = $data['ntcNo'] . '.' . $extension;
            //         $data['con_image'] = $image;
            //     }
            // }          

            // echo($data['con_image']);

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
                if($this->ownerModel->findConByNIC($data['nic'])){
                    $data['nic_err'] = 'NIC is already taken';
                }
            }

            //validate ntcNo
            if(! preg_match('/^C\d{5}$/', $data['ntcNo'])){
                $data['ntcNo_err'] = 'A valid NTC No is required';
            }
            else{
                if($this->ownerModel->findConByNtcNo($data['ntcNo'])){
                    $data['ntcNo_err'] = 'ntc no is already taken';
                }
            }

            //validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }else{
                if($this->ownerModel->findConByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate mobile no
            if(! preg_match('/^[0-9]{10}+$/', $data['mobileNo'])){
                $data['mobileNo_err'] = 'A valid mobile no is required';
            }
            else{
                if($this->ownerModel->findConByMobileNo($data['mobileNo'])){
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
                

                // register conductor
                if( $this->ownerModel->register($data) && $this->requestModel->add_con_request($data) ){
                    direct('owner_conductors/view_conductors');
                   
                }else{
                    die('Sorry! Something went wrong');
                }

            }else{
                // load view with errors
                $this->view('owner/con_register', $data);
            
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
                'con_image' => '',
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
            $this->view('owner/con_register', $data);
        }
    }



}

?>