<?php

class Pages extends Controller{
    public function __construct(){
        //
    }


    // landing page
    public function index(){
        $this->view('pages/index');
    }


    // terms & conditions page
    public function terms_conditions(){
        $this->view('pages/terms_conditions');
    }

    
    // contact us page
    public function contact_us(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             // initialize data
             $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => '' 
            ];

            
            // validate data
            
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
            if($data['subject'] == 'default'){
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
                $this->view('pages/contact_us', $data);
            }
        }else{
            // initialize default values
            $data = [
                'name' => '',
                'email' => '',
                'mobileNo' => '',
                'subject' => '',
                'message' => '',
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => ''
            ];

            // load the view with the default data
            $this->view('pages/contact_us', $data);
        }
    }
}

// .................. example ...............................

// public function about($name, $age){
//     $data = [
//         'username' => $name,
//         'userAge' => $age
//     ];

//     $this->view('v_about', $data);  
// }