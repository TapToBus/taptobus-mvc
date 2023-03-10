<?php

class Owner_buses extends Controller{

    private $ownerModel;
    private $ownerModel1;
    private $ownerModel2;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->ownerModel = $this->model('m_owner_buses');
        $this->ownerModel1 = $this->model('m_owner_bus_requests');
        $this->ownerModel2 = $this->model('m_owner_conductors');
    }

    public function add_bus(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // intialize data

            
            if (isset($_POST['wifi'])) {
                $wifi = 1;
            } else{
                $wifi = 0;
            }

            if (isset($_POST['usb'])) {
                $usb = 1;
            }else{
                $usb = 0;
            }

            if (isset($_POST['tv'])) {
                $tv = 1;
            } 
            else{
                $tv = 0;
            }


            $data = [
                'bus_no' => $_POST['bus_no'],
                'root_no' => $_POST['root_no'],
                // 'owner_name' => $_POST['owner_name'],
                'capacity'  => $_POST['capacity'],
                'bus_image'  => $_POST['bus_image'],
                'permit_image'  => $_POST['permit_image'],
                'wifi'  => $wifi,
                'usb'  => $usb,
                'tv'  => $tv,
                'bus_no_err' => '',
                'root_no_err' => '',
                'capacity_err' => '',
            ];

            //validate bus no
            if(! preg_match('/^[N][B-E]-\d{4}$/', $data['bus_no'])){
                $data['bus_no_err'] = 'A valid bus number is required';
            }else{
                if($this->ownerModel->findOwnerByBusNo($data['bus_no'])){
                    $data['bus_no_err'] = 'Bus No is already used';
                }
            }

            

            //validate root no
            if(! preg_match('/^[E]-[1-6]$/', $data['root_no'])){ 
                $data['root_no_err'] = 'A valid root number is required';
            }
   
             //validate capacity
             if(! preg_match('/^[4-5][0-9]$|^60$/', $data['capacity'])){
                $data['capacity_err'] = 'A valid capacity is required';
            }

            if(empty($data['bus_no_err'])&&empty($data['root_no_err'])&&empty($data['capacity_err']))

             {

                if( $this->ownerModel->add_bus($data)&&$this->ownerModel1->add_bus_request($data)){
                     direct('owner_buses/view_buses');
                }
                else{
                     die('Sorry! Something went wrong');
                }
             }

             else{
                // load view with errors
                $this->view('owner/add_bus', $data);
    
            }
        }
        
        else{
            // intialize default values
            $data = [
                'bus_no' => '',
                'root_no' => '',
                'owner_name' => '',
                'pic' => '',
                'nic' => '',
                'capacity'  => '',
                'bus_image'  => '',
                'permit_image'  =>'',
                'wifi'  => '',
                'usb'  => '',
                'tv'  => '',
                'bus_no_err' => '',
                'root_no_err' => '',
                'capacity_err' => '',
            
            ];

            // load the view
            $this->view('owner/add_bus', $data);
        }
    }

    public function view_buses(){

        $data = $this->ownerModel->view_buses();
        $this->view('owner/view_buses', $data);

        // if($data){
        //     return $data;
        // }else{
        //     return false;
        // }
    }

    public function bus_details(){

        $bus_no = $_GET['bus_no'];
        $data = $this->ownerModel->bus_details($bus_no);
        $data1 = $this->ownerModel2->avail_conductors();
        $data2 = $this->ownerModel2->find_conductor_name($bus_no);
        $this->view('owner/bus_details',$data,$data1,$data2); 

    }

    public function change_conductor(){

        $con = $_POST['con_name'];
        $bus_no = $_POST['bus_no'];
        $old_con = $_POST['old_con_id'];
        $new = $this->ownerModel2->find_conductor_ntc($con);
        $con_ntc = $new->ntcNo;
        $this->ownerModel->change_conductor($con_ntc,$bus_no);    
        $this->ownerModel2->reomve_assigned_conductor($old_con); 

        $data= $this->ownerModel->bus_details($bus_no);
        $data1 = $this->ownerModel2->avail_conductors();
        $data2 = $this->ownerModel2->find_conductor_name($bus_no);
        $this->view('owner/bus_details',$data,$data1,$data2);
        
    }


}

?>