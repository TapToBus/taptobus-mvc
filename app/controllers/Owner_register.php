<?php

class Owner_register extends Controller{
    private $ownerModel;
    private $requestModel;

    public function __construct(){
        /* 1. instantiate the model inside the controller
           2. model itself instantiates the database class
           3. database class instantiates the PDO
           4. PDO is capable of deling with mysql data object
           (PDO is some sort of worker , that work intermedially that connects php stuffs and mysql stuffs )
        */ 
        $this->ownerModel = $this->model('m_owner_register');
        $this->requestModel = $this->model('m_owner_requests');
      
    }

    
    // owner register
    public function register(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // initialize data
            $data = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'nic' => $_POST['nic'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'agree' => $_POST['agree'],
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'agree_err' => '',
                
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
                if($this->ownerModel->findOwnerByNIC($data['nic'])){
                    $data['nic_err'] = 'NIC is already taken';
                }
            }

            //validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }else{
                if($this->ownerModel->findOwnerByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate mobile no
            if(! preg_match('/^[0-9]{10}+$/', $data['mobileNo'])){
                $data['mobileNo_err'] = 'A valid mobile no is required';
            }else{
                if($this->ownerModel->findOwnerByMobileNo($data['mobileNo'])){
                    $data['mobileNo_err'] = 'Mobile no is already taken';
                }
            }

           

            // validate checkbox
            if(empty($_POST['agree'])){
                $data['agree_err'] = 'Checking checkbox is required';
            }

            // make sure errors are empty
            if(empty($data['fname_err']) && empty($data['lname_err']) && 
            empty($data['nic_err']) && empty($data['email_err']) && 
            empty($data['mobileNo_err']) && empty($data['agree_err']) ){
                    
                // register owner
                if( $this->ownerModel->register($data)  && $this->requestModel->add_owner_request($data) ){
                    direct('pages/index');
                   
                }else{
                    die('Sorry! Something went wrong');
                }
                // newly added
                // if($this->ownerModel->register($data)){
                //     direct('pages/index');
                // }else{
                //     die('Sorry! Something went wrong');
                // }

            }else{
                // load view with errors
                $this->view('owner/register', $data);
            
            }
        }

        else
        {

            // initialize default values
           
            $data = [
                'fname' => '',
                'lname' => '',
                'nic' => '',
                'email' => '',
                'mobileNo' => '',
                'agree' => '',
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'agree_err' => '',
                
            ];
          
            // load the view with the default data
            $this->view('owner/register', $data);
        }
    }
}
