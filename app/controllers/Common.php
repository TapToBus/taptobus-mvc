<?php

class Common extends Controller{
    public function __construct(){
        //
    }

    public function index(){
        $this->view('common/index');
    }

    public function terms_conditions(){
        $this->view('common/terms_conditions');
    }

    public function contact_us(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             // initialize data
             $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'message' => $_POST['message'],
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => '' 
            ];

            // validate
            // validate name
            if(! preg_match("/^[A-Za-z]+( [A-Za-z]+)*$/", $data['name']) || strlen($data['name']) < 3){
                $data['name_err'] = "A valid name is required";
            }

            // validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }

            // validate mobile no
            if(! preg_match('/^[0-9]{10}+$/', $data['mobileNo'])){
                $data['mobileNo_err'] = 'A valid mobile no is required';
            }

            // validate subject
            if(empty($_POST['subject'])){
                $data['subject_err'] = 'Subject is required';
            }

            // validate message
            if(empty($data['message'])){
                $data['message_err'] = 'Message is required';
            }elseif(strlen($data['message']) < 10){
                $data['message_err'] = 'Message is too short';
            }

             // make sure errors are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['mobileNo_err']) && 
                empty($data['subject_err']) &&  empty($data['message_err'])){
                
                // send mail
                die('Mail sent');

            }else{
                // load view with errors
                $this->view('common/contact_us', $data);
            }
        }else{
            // initialize default values
            $data = [
                'name' => '',
                'email' => '',
                'mobileNo' => '',
                'message' => '',
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => ''
            ];

            // load the view with the default data
            $this->view('common/contact_us', $data);
        }
    }

    public function register_type(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'type' => '',
                'type_err' => ''
            ];

            // validate
            if(isset($_POST['type'])){
                $data['type'] = $_POST['type'];
                
                if($data['type'] == 'passenger'){
                    // direct to the passenger register form
                    direct('passenger/register');
                }elseif($data['type'] == 'owner'){
                    // direct to the owner register form
                    direct('owner/register');
                }
            }else{
                $data['type_err'] = 'Please select your type';
                // load the view with error
                $this->view('common/register_type', $data);
            }
        }else{
            // initialize default values
            $data = [
                'type' => '',
                'type_err' => ''
            ];

            $this->view('common/register_type', $data);
        }
    }

    public function login(){
        $this->view('common/login');
    }
}