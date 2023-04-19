<?php
class Admin_view_user_dashboard extends Controller{

    private $pagesModelPassengers;
    private $pagesModelBuses;
    private $pagesModelStaffMembers;
    private $pagesModelBusOwners;
    private $pagesModelBusDrivers;
    private $pagesModelBusConductors;

    public function __construct()
    {
        $this->pagesModelPassengers = $this->model('M_Admin_passenger_details');
        $this->pagesModelBuses = $this->model('M_Admin_bus_details');
        $this->pagesModelStaffMembers = $this->model('M_Admin_staff_member_details');
        $this->pagesModelBusOwners = $this->model('M_Admin_bus_owner_details');
        $this->pagesModelBusDrivers = $this->model('M_Admin_bus_driver_details');
        $this->pagesModelBusConductors = $this->model('M_Admin_bus_conductor_details');
        
    }

    public function index(){

    }

    // view users dashboard

    public function view_user_dashboard(){
        $this->view('admin/view_users');
    }

    // view passenger page

    public function view_passenger (){

        $passengers = $this->pagesModelPassengers->getpassengers();

        $data = ['passengers' => $passengers];

        $this->view('admin/view_passenger',$data);
    }

    // view bus page

    public function view_bus(){
        $buses = $this->pagesModelBuses->getbuses();

        $data = ['buses' => $buses];

        $this->view('admin/view_bus', $data);
    }

    //view staff member page

    public function view_staff_member(){

        $staffmembers = $this->pagesModelStaffMembers->getstaffmembers();
        
        $data = ['staffmembers' => $staffmembers];

        $this->view('admin/view_staff_member', $data);
    }

    //view bus owner page

    public function view_bus_owner(){
            
        $owners = $this->pagesModelBusOwners->getowners();

        $data = ['owners' => $owners];

        $this->view('admin/view_bus_owner', $data);

    }

    //view bus driver page

    public function view_bus_driver(){
        $drivers = $this->pagesModelBusDrivers->getdrivers();
        $data = ['drivers' => $drivers];
        $this->view('admin/view_bus_driver', $data);
    }

    //delete bus conductor from users

    public function delete_bus_driver(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['deleteBusDriverBtn'])){
                $ntcNo = $_POST['deleteBusDriverBtn'];
                $response = $this->pagesModelBusDrivers->deletedrivers($ntcNo);
                $this->view_bus_driver();
            }
        }
    }    
    



    //view bus conductor page

    public function view_bus_conductor(){
        $conductors = $this->pagesModelBusConductors->getconductors();
        $data = ['conductors'=> $conductors];
        $this->view('admin/view_bus_conductor',$data);
    }

    //delete bus conductor from users

    public function delete_bus_conductor(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['deleteBusConductorBtn'])){
                $ntcNo = $_POST['deleteBusConductorBtn'];
                $response = $this->pagesModelBusConductors->deleteconductors($ntcNo);
                $this->view_bus_conductor();
            }
        }
    }




    

    // public function GeneratePassengerReport(){
    //     // Generate the PDF report using the FPDF library
    //     $pdf = new FPDF();
       
    //     // creating a new PDF document with landscape orientation and A4 page size 
    //     $pdf->AddPage('L','A4');
       
              
    //     $pdf->SetFont('Arial', 'B', 20);

    //     $pdf->Cell(0, 10, 'TapToBus '. $service.' '.$period. ' Payment Details', 0, 1, 'C');
    //     $pdf->Cell(0, 10, $period.' profit : Rs. '.Round($payment_profit->profit,2 ), 0, 1, 'C');
       
       
    //     $pdfWidth = $pdf->GetPageWidth();
    //     $pdfHeight = $pdf->GetPageHeight();

    //     $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

    //     $pdf->SetFont('Arial', 'B', 14);
    //     $pdf->SetTitle('passenger report');
    //     $pdf->SetTextColor(255, 255, 255);
       


    //     $pdf->Cell(109, 10, 'nic', 1 , 0, 'C',1);
    //     $pdf->Cell(30, 10, 'first name', 1 , 0, 'C',1);
    //     $pdf->Cell(60, 10, 'last name', 1 , 0, 'C',1);
    //     $pdf->Cell(30, 10, 'email', 1 , 0, 'C',1);
    //     $pdf->Cell(50, 10, 'mobile number', 1 , 0, 'C',1);
    //      $pdf->Ln();
        
    //     $pdf->SetTextColor(0, 0, 0);
        
    //     $pdf->SetFont('Arial', '', 12);
    //     foreach ($$passengers as $row) {
        
          

    //         $pdf->Cell(109,10,  $row->nic, 1 , 0, 'C');
           
    //         $pdf->Cell(109,10,  $row->first_name.' '. $row->last_name, 1 , 0, 'C');
       
    //         $pdf->Cell(109,10,  $row->first_name.' '. $row->last_name, 1 , 0, 'C');
           
             
           

    //    $pdf->Ln();
   

    //     }

       
        
    //     $pdf->AliasNbPages();
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
    //     // $pdf->Output();
    //      $pdf->Output('taptobus.pdf', 'D');
       
         
               
    // }

    // }else{
    //   redirect('Login/login');  
    // }
}






?>