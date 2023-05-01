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

            if(isset($_GET['date_from'])){
                $_SESSION['date_from'] = $_GET['date_from'];
            }
          
            if(isset($_GET['date_to'])){
                $_SESSION['date_to'] = $_GET['date_to'];
            }

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


    // Generate the PDF report using the FPDF library
   public function generate_pdf_report(){

    if(empty($_SESSION['date_from'])){
        $_SESSION['date_from'] = 2022-01-01;
    }
  
    if(empty($_SESSION['date_to'])){
        $_SESSION['date_to'] = date('Y-m-d'); 
    }

    $reportData = $this->profitTableModel->get_search_income_records($_SESSION['date_from'],$_SESSION['date_to']);

    $pdf = new FPDF();
       
    // creating a new PDF document with landscape orientation and A4 page size 
    $pdf->AddPage('L','A4');
   
          
    $pdf->SetFont('Arial', 'B', 20);

    $pdf->Cell(0, 10, 'TapToBus '. $_SESSION['date_from'].' to '.$_SESSION['date_to']. ' Profit Details', 0, 1, 'C');
    $pdf->Cell(0, 10,' ', 0, 1, 'C');
   
   
    $pdfWidth = $pdf->GetPageWidth();
    $pdfHeight = $pdf->GetPageHeight();

    $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetTitle('TapToBus Profit Details Report');
    $pdf->SetTextColor(255, 255, 255);
   
    $pdf->Cell(70, 10, 'Record ID', 1 , 0, 'C',1);
    $pdf->Cell(70, 10, 'Bus Number', 1 , 0, 'C',1);
    $pdf->Cell(70, 10, 'Date', 1 , 0, 'C',1);
    $pdf->Cell(70, 10, 'Profit', 1 , 0, 'C',1);

     $pdf->Ln();
    
    $pdf->SetTextColor(0, 0, 0);
    
    $pdf->SetFont('Arial', '', 12);
    foreach ($reportData as $row) {
    
        $pdf->Cell(70,10, $row->record_id, 1 , 0, 'C');
        $pdf->Cell(70,10, $row->bus_no, 1 , 0, 'C');
        $pdf->Cell(70,10, $row->date, 1 , 0, 'C');
        $pdf->Cell(70,10, $row->profit, 1 , 0, 'C');
       
   $pdf->Ln();

    }

    $pdf->AliasNbPages();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
    
    // $pdf->Output();
     $pdf->Output('TapToBus.pdf', 'D');
      
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
