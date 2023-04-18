<?php
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Staff_view_requests extends Controller{
        private $ownerModel;
        private $driverModel;
        private $conductorModel; 
        private $busModel;

        public function __construct()
        {     if(! isLoggedIn()){
            direct('users/login');
            }       
            
            $this->ownerModel = $this->model("M_staff_requests");
            $this->driverModel = $this->model("M_staff_requests");
            $this->conductorModel = $this->model("M_staff_requests");
            $this->busModel = $this->model("M_staff_requests");            
        }

       
// get the pending requests from the model and pass it to the corresponding view

        public function bus_requests(){            
            $busRequests = $this->busModel->busRequests();
            $data = ['busRequests' => $busRequests];
            // $bus_no = $data['busRequests'][0]->bus_no; // to get date 
            // print_r($bus_no);
            // die();
            $this->view('staff/bus_requests' , $data);
        }

        public function owner_requests(){
            $ownerRequests = $this->ownerModel->ownerRequests();
            $data = ['ownerRequests' => $ownerRequests];
            $this->view('staff/owner_requests' , $data);

        }

        public function driver_requests(){
            $driverRequests = $this->driverModel->driverRequests();
            $data = ['driverRequests' => $driverRequests];
            $this->view('staff/driver_requests', $data);
            
        }

        public function conductor_requests(){
            $conductorReqquests = $this->conductorModel->conductorRequests();
            $data = ['conductorRequests' => $conductorReqquests];
            $this->view('staff/conductor_requests',$data);
            
        }

// view requests details


        public function owner_requests_details(){
            $owner_nic = $_GET['nic'];
            $ownerRequestDetails = $this->ownerModel->ownerRequestedDetails($owner_nic);
            $data = [
                    'ownerRequestDetails' => $ownerRequestDetails
            ];
            $this->view('staff/owner_requests_details',$data);
        }

        
        public function driver_requests_details(){
            $driver_nic = $_GET['nic'];
            $driverRequestDetails = $this->driverModel->driverRequestedDetails($driver_nic);
            $data = [
                'driverRequestDetails' => $driverRequestDetails
            ];
            $this->view('staff/driver_requests_details',$data);
        }

        
        public function conductor_requests_details(){
            $conductor_nic = $_GET['nic'];
            $conductorRequestsDetails = $this->driverModel->conductorRequestedDetails($conductor_nic);
            $data = [ 
                    'conductorRequestDetails' => $conductorRequestsDetails
            ];
            $this->view('staff/conductor_requests_details',$data);
        }


        public function bus_requests_details(){
            $bus_no = $_GET['bus_no'];          
            
            $busRequestDetails = $this->busModel->busRequestedDetails($bus_no);
            $data = [
                'busRequestDetails' => $busRequestDetails
            ];
            $this->view('staff/bus_requests_details',$data);
        }
    
// Accept requests by relavent staff member

        //-------------------------- Accept bus requests -----------------------------
        public function accept_bus_requests(){
           
            $bus_no = $_GET['bus_no'];
            $owner_nic = $_GET['owner_nic'];
            $staff_no = $_SESSION['user_id'];
            
          
            $data1 = [
                'bus_no' => $bus_no,
                'status' => 'accepted'
            ]; 

            $this->busModel->accept_bus_request($data1);  

            $data2 = [
                'bus_no' => $bus_no,
                'status' => 'accepted',
                'staff_no' => $staff_no 
            ];

            $this->busModel->update_staff_id_for_bus($data2);

            $owner_data = $this->busModel->get_owner_email($owner_nic); ///  <------- get reciver email and name (in here get owner email and name)
            // print_r($owner_data->email);
            // print_r($owner_data->fname);
            // print_r($owner_data->lname);
            // die();



                            // start phpmailer -------------------------------

                                //Load Composer's autoloader
                                require APPROOT . '/phpmailer/vendor/autoload.php';

                                //Create an instance; passing `true` enables exceptions
                                $mail = new PHPMailer(true);

                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Enable verbose debug output
                                //$mail->SMTPDebug = 2;
                                $mail->isSMTP();                                    //Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                           //Enable SMTP authentication
                                $mail->Username   = 'taptobus001@gmail.com';  //SMTP username
                                $mail->Password   = 'lfpugqktlvomvxop';             //SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
                                //$mail->SMTPSecure = 'tls';
                                $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                //$mail->Port       = 587;

                                //Recipients
                                $mail->setFrom('taptobus001@gmail.com', 'TapToBus Company');
                                $mail->addAddress($owner_data->email, $owner_data->fname);     //Add a recipient    // <------------- $data['email], $data['fname'] 
                                /*$mail->addAddress('ellen@example.com');                           //Name is optional
                                $mail->addReplyTo('info@example.com', 'Information');
                                $mail->addCC('cc@example.com');
                                $mail->addBCC('bcc@example.com');*/

                                //Attachments
                                /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name

                                //Content
                                $mail->isHTML(true);                                    //Set email format to HTML
                                $mail->Subject = 'Successfully added to TapToBus' ;//<-------------
                                $mail->Body =  '<p> Dear '.$owner_data->fname.'! <br>'.'Your bus '.$data1['bus_no'].' is successfully added to the TapToBus System' ; //<-------------


                                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                if ($mail->send()) {
                                    die("successfuly sent mail");
                                    direct('Staff_view_requests/accept_bus_requests');
                                } else {
                                    die('Message could not be sent');
                                }

                                // end phpmailer ---------------------------------

            direct('Staff_view_requests/bus_requests');

            //----------------------------------------------
     
            // direct('Staff_view_requests/bus_requests');//we cant use view here bcz we are not passing any data to render the relavent page

            // if you want to render the details page with the requested data you should pass the it to the direct page
            // direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);

        }

        // -------------Accept owner reqests---------------------

        public function accept_owner_requests(){
           
            $owner_nic = $_GET['owner_nic'];
            $staff_no = $_SESSION['user_id'];

            $data1 = [
                'owner_nic' => $owner_nic,
                'status' => 'accepted'
            ]; 
          
            $this->ownerModel->accept_owner_request($data1);  

            $data2 = [
                'owner_nic' => $owner_nic,
                'staff_no' => $staff_no ,
                'status' => 'accepted' ,             
            ]; 
            
            $this->ownerModel->update_staff_id_for_owner($data2);
            direct('Staff_view_requests/owner_requests');

            
        }

        //--------------Accept conductor requests-------------------
        public function accept_conductor_requests(){
          
            $conductor_ntc = $_GET['conductor_ntc'];
            $staff_no = $_SESSION['user_id'];
            
          
            $data1 = [
                'conductor_ntc'=>$conductor_ntc,
                'status' => 'accepted'
            ]; 
            
            $this->conductorModel->accept_conductor_request($data1);  
            $data2 = [
                'conductor_ntc' => $conductor_ntc,
                'status' => 'accepted',
                'staff_no' => $staff_no 
            ];

            $this->conductorModel->update_staff_id_for_conductor($data2);
            
            direct('Staff_view_requests/conductor_requests');

        }

        // -------------Accept driver requests-----------------------
        public function accept_driver_requests(){
           
            $driver_ntc = $_GET['driver_ntc'];
            $staff_no = $_SESSION['user_id'];
            
          
            $data1 = [
                'driver_ntc' => $driver_ntc,
                'status' => 'accepted'
            ]; 

            $this->busModel->accept_driver_request($data1);  

            $data2 = [
                'driver_ntc' => $driver_ntc,
                'status' => 'accepted',
                'staff_no' => $staff_no 
            ];

            $this->busModel->update_staff_id_for_driver($data2);

            direct('Staff_view_requests/driver_requests');

        }



// Reject requests by relavent staff member

        // -------- reject bus requests ---------------------

        public function reject_bus_requests(){

            $bus_no = $_GET['bus_no'];
            $staff_no = $_SESSION['user_id'];

            $data1 = [
                'bus_no' => $bus_no,
                'status' => 'rejected'
            ];

            $this->busModel->reject_bus_requests($data1); // update the bus tabel status

    
             //    ------- check whether the reason is empty or not ------------

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['send'])){
                    if(isset($_POST['reject_reason']) && !empty(trim($_POST['reject_reason']))){  // Check if reject_reason is set and not empty.

                        // print_r($_POST['reject_reason']);
                        // die();
                        
                        $bus_details = $this->busModel->busRequestedDetails($bus_no);
                        $data2 = [
                            'bus_details' => $bus_details
                        ];

                        // $owner_nic = $data2['bus_details']->owner_nic;

                        $data3 = [
                            // 'owner_nic' => $owner_nic,
                            'staff_no' => $staff_no ,
                            'status' => 'rejected',
                            'reject_reason' =>$_POST['reject_reason']                
                        ];
            
                        $this->busModel->update_staff_id($data3); // update  the status and the staff_no on bus_request table
            
                        direct('Staff_view_requests/bus_requests');


                    }else{
                        echo "Please enter a reason for the rejection";
                    }
                }
                else if(isset($_POST['cancel'])){
                    direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);
                }
            }
          
         

        }

        // --------------------reject owner requests----------------
        

        // -------------------reject conductor requests-------------

        // --------------------reject driver requests----------------



    }
?>