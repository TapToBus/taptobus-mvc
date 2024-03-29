<?php

class Owner_buses extends Controller
{

    private $ownerModel;
    private $ownerModel1;
    private $ownerModel2;
    private $ownerModel3;
    private $ownerModel4;

    public function __construct()
    {
        if (!isLoggedIn()) {
            direct('users/login');
        }

        $this->ownerModel = $this->model('m_owner_buses');
        $this->ownerModel1 = $this->model('m_owner_bus_requests');
        $this->ownerModel2 = $this->model('m_owner_conductors');
        $this->ownerModel3 = $this->model('m_conductor_incomerecords');
        $this->ownerModel4 = $this->model('m_owner_drivers');
    }

    public function add_bus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // intialize data


            if (isset($_POST['wifi'])) {
                $wifi = 1;
            } else {
                $wifi = 0;
            }

            if (isset($_POST['usb'])) {
                $usb = 1;
            } else {
                $usb = 0;
            }

            if (isset($_POST['tv'])) {
                $tv = 1;
            } else {
                $tv = 0;
            }


            $data = [
                'bus_no' => $_POST['bus_no'],
                'root_no' => $_POST['root_no'],
                // 'owner_name' => $_POST['owner_name'],
                'capacity'  => $_POST['capacity'],
                'bus_image'  => "",
                'permit_image'  =>"",
                'wifi'  => $wifi,
                'usb'  => $usb,
                'tv'  => $tv,
                'bus_no_err' => '',
                'root_no_err' => '',
                'capacity_err' => '',
            ];

            
            if (!empty($_FILES["bus_image"]) && is_uploaded_file($_FILES['bus_image']['tmp_name'])) {
                // $fileName = "user";
                $msg = upload_file("bus_image", "bus", $data['bus_no'], ['png', 'jpeg', 'jpg'], 50000000, TRUE, TRUE);
                if (!empty($msg)) {
                    $image = "";
                } else {
                    $target_file = basename($_FILES["bus_image"]["name"]);
                    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image = $data['bus_no'] . '.' . $extension;
                    $data['bus_image'] = $image;
                }
            } 

            if (!empty($_FILES["permit_image"]) && is_uploaded_file($_FILES['permit_image']['tmp_name'])) {
                // $fileName = "user";
                
                $uni = uniqid();
                $msg = upload_file("permit_image", "permit",$uni, ['png', 'jpeg', 'jpg'], 50000000, TRUE, TRUE);
                if (!empty($msg)) {
                    $image = "";
                } else {
                    $target_file = basename($_FILES["permit_image"]["name"]);
                    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image = $uni . '.' . $extension;
                    $data['permit_image'] = $image;
                }
            } 

            //validate bus no
            if (!preg_match('/^[N][B-E]-\d{4}$/', $data['bus_no'])) {
                $data['bus_no_err'] = 'A valid bus number is required';
            } else {
                if ($this->ownerModel->findOwnerByBusNo($data['bus_no'])) {
                    $data['bus_no_err'] = 'Bus No is already used';
                }
            }


            //validate root no
            if (!preg_match('/^[E]-[1]$/', $data['root_no'])) {
                $data['root_no_err'] = 'A valid root number is required';
            }

            //validate capacity
            if (!preg_match('/^(25|33)$/', $data['capacity'])) {
                $data['capacity_err'] = 'A valid capacity is required';
            }

            if (empty($data['bus_no_err']) && empty($data['root_no_err']) && empty($data['capacity_err'])) {

                if ($this->ownerModel->add_bus($data) && $this->ownerModel1->add_bus_request($data)) {
                    direct('owner_buses/view_buses');
                } else {
                    die('Sorry! Something went wrong');
                } 
            } else {
                // load view with errors
                $this->view('owner/add_bus', $data);
            } 
        } else {
            // intialize default values
            $data = [
                'bus_no' => '',
                'root_no' => '',
                'owner_name' => '',
                'pic' => '',
                'nic' => '',
                'capacity'  => '',
                'bus_image'  => '',
                'permit_image'  => '',
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

    public function view_buses()
    {

        $data = $this->ownerModel->view_buses();
        $this->view('owner/view_buses', $data);

        // if($data){
        //     return $data;
        // }else{
        //     return false;
        // }
    }

    public function bus_details()
    {

        $bus_no = $_GET['bus_no'];
        $data = $this->ownerModel->bus_details($bus_no);
        $data1 = $this->ownerModel2->avail_conductors();
        $data2 = $this->ownerModel2->find_conductor_name($bus_no);
        $data3 = $this->ownerModel3->view_incomerecords_forbus($bus_no);
        $data4 = $this->ownerModel4->avail_drivers();
        $data5 = $this->ownerModel4->find_driver_name($bus_no);
        // var_dump($data2->fname);
        $this->view('owner/bus_details', $data, $data1, $data2, $data3, $data4, $data5);
    }

    public function change_conductor()
    {
       
        $con = $_POST['con_name'];
        $bus_no = $_POST['bus_no'];
        $old_con = $_POST['old_con_id'];
        $new = $this->ownerModel2->find_conductor_ntc($con);
        $con_ntc = $new->ntcNo;
        $this->ownerModel->change_conductor($con_ntc, $bus_no);
        $this->ownerModel2->reomve_assigned_conductor($old_con);

        $data = $this->ownerModel->bus_details($bus_no);
        $data1 = $this->ownerModel2->avail_conductors();
        $data2 = $this->ownerModel2->find_conductor_name($bus_no);
        $data3 = $this->ownerModel3->view_incomerecords_forbus($bus_no);
        $data4 = $this->ownerModel4->avail_drivers();
        $data5 = $this->ownerModel4->find_driver_name($bus_no);
        $this->view('owner/bus_details', $data, $data1, $data2, $data3, $data4, $data5);
    }

    public function change_driver()
    {

        $dr = $_POST['dr_name'];
        $bus_no = $_POST['bus_no'];
        $old_dr = $_POST['old_dr_id'];
        $new = $this->ownerModel4->find_driver_ntc($dr);
        $dr_ntc = $new->ntcNo;
        $this->ownerModel->change_driver($dr_ntc, $bus_no);
        $this->ownerModel4->reomve_assigned_driver($old_dr);

        $data = $this->ownerModel->bus_details($bus_no);
        $data1 = $this->ownerModel2->avail_conductors();
        $data2 = $this->ownerModel2->find_conductor_name($bus_no);
        $data3 = $this->ownerModel3->view_incomerecords_forbus($bus_no);
        $data4 = $this->ownerModel4->avail_drivers();
        $data5 = $this->ownerModel4->find_driver_name($bus_no);
        $this->view('owner/bus_details', $data, $data1, $data2, $data3, $data4, $data5);
    }
}
