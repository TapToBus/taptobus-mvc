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


            // validate data

            // validate username
            if(empty($data['username'])){
                $data['username_err'] = "Username is required";
            }elseif(! $this->userModel->findUserByEmail($data['username'],$data['password'])){
                // user not found
                $data['username_err'] = 'User doesn\'t exist';
            }

            // validate password
            if(empty($data['password'])){
                $data['password_err'] = "Password is required";
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
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_fname'] = $user->fname;
        $_SESSION['user_lname'] = $user->lname;
        $_SESSION['user_pic'] = $user->pic;
        $_SESSION['user_type'] = $user->type;

        switch($user->type){
            case 'passenger': {
                //die($_SESSION['user_id'] . '<br>' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '<br>' . $_SESSION['user_pic'] . '<br>' . $_SESSION['user_type']);
                direct('passenger_book_seats/journey_details');
                break;
            };

            case 'driver': {
                //
                break;
            };

            case 'conductor': {
                //
                direct('conductor_bookings/check_bookings');
                break;
            };

            case 'owner': {
                //
                direct('owner_dashboard/view_dashboard');
                break;
            };

            case 'staff': {
                direct('Staff_dashboard/staff_dash');
                break;
            };

            case 'admin': {
                direct('admin_dashboard/view_admin_dashboard');
                break;
            };
        }
    }


    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_fname']);
        unset($_SESSION['user_lname']);
        unset($_SESSION['user_pic']);
        unset($_SESSION['user_type']);
        session_destroy();
        
        // direct to the login page
        direct('users/login');
    }

    
    public function forgot_password(){
        die('Forgot password page');
    }


    public function error_404(){
        $this->view('users/error_404');
    }
}