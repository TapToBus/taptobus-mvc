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
        $this->view('common/contact_us');
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