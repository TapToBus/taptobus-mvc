<?php

class Passenger extends Controller{

    public function __construct(){
        //
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // initialize data
            $data = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'nic' => $_POST['nic'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'password' => $_POST['password'],
                'confirmPassword' => $_POST['confirmPassword'],
                // 'agree' => $_POST['agree'],
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'password_err' => '',
                'confirmPassword_err' => '',
                'agree_err' => '',
            ];

            // validate
            // validate first name
            

            // validate last name


            // validate nic
            

            // validate email


            // validate mobile no


            // validate password


            // validate confirm password


            // validate checkbox
            if(empty($_POST['agree'])){
                $data['agree_err'] = 'off';
            }

            // make sure errors are empty
            if(empty($data['fname_err']) && empty($data['lname_err']) && 
                empty($data['nic_err']) && empty($data['email_err']) && 
                empty($data['mobileNo_err']) && empty($data['password_err']) && 
                empty($data['confirmPassword_err']) && empty($data['agree_err'])){
                    
                    // hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // register user

            }else{
                // load view with errors
                $this->view('passenger/register', $data);
            }
        }else{
            // initialize default values
            $data = [
                'fname' => '',
                'lname' => '',
                'nic' => '',
                'email' => '',
                'mobileNo' => '',
                'password' => '',
                'confirmPassword' => '',
                // 'agree' => '',
                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'password_err' => '',
                'confirmPassword_err' => '',
                'agree_err' => ''
            ];

            // load the view with the default data
            $this->view('passenger/register', $data);
        }
    }
}