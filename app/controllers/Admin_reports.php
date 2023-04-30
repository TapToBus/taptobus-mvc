<?php

class Admin_reports extends Controller{

    // private $dateFromDateToModel;

    private $profitTableModel;

    public function __construct()
    {
        //check if admin is logined to the system
        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');
        }

        // $this->dateFromDateToModel = $this->model('M_Admin_reports');


        //get data from incomerecord table
        $this->profitTableModel = $this->model('M_Admin_report');
        
    }

    public function index(){

    }

    //view admin report page
    
    public function view_admin_reports(){
        $reportData = $this->profitTableModel->get_income_records();
        $data = ['reportData' => $reportData];

        $this->view('admin/reports', $data);
    }

    public function adminReportSearch(){

        //check if form is submitted
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //get data form data array
            $_GET = filter_input_array(INPUT_GET,FILTER_SANITIZE_STRING);

            $date_from=trim($_GET['date_from']);
            $date_to=trim($_GET['date_to']);

            $reportData = $this->profitTableModel->get_search_income_records($date_from,$date_to);

            $data=[

                'reportData'=>$reportData,
                'date_from'=>$date_from,
                'date_to'=>$date_to

            ];

            $this->view('admin/reports',$data);
        }
        else{
            $data=[
                'reportData'=>'',
                'date_from'=>'',
                'date_to'=>''
            ];

            $this->view('admin/reports',$data);
        }

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