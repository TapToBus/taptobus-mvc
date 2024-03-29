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
                direct('passenger_book_seats/journey_details');
                break;
            };

            case 'driver': {
                direct('driver_schedule/view_schedule');
                break;
            };

            case 'conductor': {
                direct('conductor_bookings/check_bookings');
                break;
            };

            case 'owner': {
                direct('owner_dashboard/view_dashboard');
                break;
            };

            case 'staff': {
                direct('staff_dashboard/staff_dash');
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => $_POST['email'],
                'email_err' => ''
            ];

            if(empty($data['email'])){
                $data['email_err'] = 'Email is required';
            }else{
                if(! $this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'User doesn\'t exist';
                }
            }

            if(empty($data['email_err'])){
                $user = $this->userModel->findUserDetails($data['email']);
                $otp = generateOTP();

                $this->userModel->setUserOTP($user->id, $otp);

                $mailer = new Mailer(TAPTOBUS_EMAIL, TAPTOBUS_PASS, 'TapToBus');
                
                $subject = forgotPassSubject();
                $body = forgotPassBody($otp);

                if ($mailer->send($data['email'], $subject, $body)) {
                    $_SESSION['temp_id'] = $user->id;
                    $_SESSION['temp_type'] = $user->type;

                    direct('users/verify_otp');
                } else {
                    die('Sorry! Something went wrong');
                }
            }else{
                $this->view('users/forgot_password', $data);
            }
        }else{
            $data = [
                'email' => '',
                'email_err' => ''
            ];

            $this->view('users/forgot_password', $data);
        }
    }


    public function verify_otp(){
        if(isset($_SESSION['temp_id'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'otp' => $_POST['otp'],
                    'otp_err' => ''
                ];
                
                // check the OTP is not enter or incorrect
                if (empty($data['otp'])) {
                    $data['otp_err'] = 'OTP is required';
                }else{
                    $user = $this->userModel->getUserDetails($_SESSION['temp_id']);

                    if($data['otp'] != $user->otp){
                        $data['otp_err'] = 'Incorrect OTP';
                    }
                }

                if(empty($data['otp_err'])){
                    direct('users/reset_password');
                }else{
                    $this->view('users/verify_otp', $data);
                }
            }else{
                $data = [
                    'otp' => '',
                    'otp_err' => ''
                ];

                $this->view('users/verify_otp', $data);
            }
    
            
        }else{
            
        }
    }


    public function reset_password(){
        if(isset($_SESSION['temp_id'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'new_pwd' => $_POST['new_pwd'],
                    'confirm_pwd' => $_POST['confirm_pwd'],
                    'new_pwd_err' => '',
                    'confirm_pwd_err' => ''
                ];

                // validate password
                if (empty($data['new_pwd'])) {
                    $data['new_pwd_err'] = 'Passworrd is required';
                } elseif (strlen($data['new_pwd']) < 8) {
                    $data['new_pwd_err'] = 'Password must contain at least 8 characters';
                } elseif (!preg_match("/[0-9]/", $data['new_pwd'])) {
                    $data['new_pwd_err'] = 'Password must contain at least 1 number';
                } elseif (!preg_match("/[a-z]/i", $data['new_pwd'])) {
                    $data['new_pwd_err'] = 'Password must contain at least 1 letter';
                } elseif (!preg_match("/[^\w]/", $data['new_pwd'])) {
                    $data['new_pwd_err'] = 'Password must contain at least 1 special character';
                }

                // validate confirm password
                if (empty($data['confirm_pwd'])) {
                    $data['confirm_pwd_err'] = 'Confirm password is required';
                } elseif ($data['new_pwd'] != $data['confirm_pwd']) {
                    $data['confirm_pwd_err'] = 'Paswords must match';
                }

                if(empty($data['new_pwd_err']) && empty($data['confirm_pwd_err'])){
                    $hash_pwd = password_hash($data['new_pwd'], PASSWORD_DEFAULT);

                    $this->userModel->updateUserPassword($_SESSION['temp_id'], $hash_pwd);
                    $this->userModel->updateRelevantUserTable($_SESSION['temp_id'], $hash_pwd, $_SESSION['temp_type']);

                    unset($_SESSION['temp_id']);
                    unset($_SESSION['temp_type']);

                    direct('users/login');
                }else{
                    $this->view('users/reset_password', $data);
                }
            }else{
                $data = [
                    'new_pwd' => '',
                    'confirm_pwd' => '',
                    'new_pwd_err' => '',
                    'confirm_pwd_err' => ''
                ];

                $this->view('users/reset_password', $data);
            }
        }else{
            direct('pages/index');
        }
    }


    public function error_404(){
        $this->view('users/error_404');
    }
}