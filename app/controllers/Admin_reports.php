<?php

class Admin_reports extends Controller{

    // private $dateFromDateToModel;

    public function __construct()
    {
        //check if admin is logined to the system
        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');
        }

        // $this->dateFromDateToModel = $this->model('M_Admin_reports');
        
    }

    public function index(){

    }

    //view admin report page
    
    public function view_admin_reports(){
        $this->view('admin/reports');
    }

    // public function Date_From_Date_To(){

    //     //check if form is submitted
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //         //get data form data array
    //         $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

    //         $data=[
    //             'date_from' => trim($_POST['date_from']),
    //             'date_to' => trim($_POST['date_to']),
    //         ];

    //     }

    // }
}


?>