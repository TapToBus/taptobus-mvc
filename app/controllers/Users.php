<?php

class Users extends Controller{
    private $userModel;


    public function __construct(){
        $this->userModel = $this->model('m_users');
    }


    public function register_type(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'type' => $_POST['type'],
                'type_err' => ''
            ];

            // validate
            
            if($data['type'] == 'default'){
                $data['type_err'] = 'Register type is required';
            }

            // make sure errors are empty
            if(empty($data['type_err'])){
                if($data['type'] == 'passenger'){
                    // direct to the passenger register form
                    direct('passenger_register/register');
                }elseif($data['type'] == 'owner'){
                    // direct to the owner register form
                    direct('owner_register/register');
                }
            }else{
                // load the view with error
                $this->view('users/register_type', $data);
            }
        }else{
            // initialize default values
            $data = [
                'type' => '',
                'type_err' => ''
            ];

            $this->view('users/register_type', $data);
        }
    }


    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             // initialize data
             $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'username_err' => '',
                'password_err' => ''
            ];

            // validate

            // validate username
            if(empty($data['username'])){
                $data['username_err'] = "Username is required";
            }

            // validate password
            if(empty($data['password'])){
                $data['password_err'] = "Password is required";
            }

            // check for user email
            if(! $this->userModel->findUserByUsername($data['username'])){
                // user not found
                $data['username_err'] = 'User doesn\'t exist';
            }

            // make sure errors are empty
            if(empty($data['username_err']) && empty($data['password_err'])){
                // check for user
                $user = $this->userModel->login($data['username'], $data['password']);

                if($user){
                    // create session
                    $this->createSession($user);
                }else{
                    $data['password_err'] = 'Incorrect password';
                    $this->view('users/login', $data);
                }
            }else{
                // load view with errors
                $this->view('users/login', $data);
            }
        }else{
             // initialize default values
             $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => ''
            ];

            // load the view with default values
            $this->view('users/login', $data);
        }
    }


    public function createSession($user){
        /*$_SESSION['user_id'] = $user->nic;
        $_SESSION['user_name'] = $user->fname;*/
        $_SESSION['user_email'] = $user->username;
        $_SESSION['user_type'] = $user->type;
        
        // direct to the user home page
        //die('Login Success' . '<br>User id: ' . $_SESSION['user_id'] . '<br>User name: ' . $_SESSION['user_name'] . '<br>User email: ' . $_SESSION['user_email']);
        die('Login Success' . '<br>User email: ' . $_SESSION['user_email'] . '<br>User type: ' . $_SESSION['user_type']);
    }


    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        
        direct('users/login');
    }

    
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }


    public function forgot_password(){
        die('Forgot password page');
    }
}