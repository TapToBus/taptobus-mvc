<?php
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
          
            $mailer = new Mailer(TAPTOBUS_EMAIL , TAPTOBUS_PASS , SITENAME);
            $subject  = 'Successfully added to TapToBus' ;
            $Body =  '<p> Dear '.$owner_data->fname.'! <br>'.'Your bus <b>'.$data1['bus_no'].'</b> is successfully added to the TapToBus System' ;               
              
            if ($mailer->send($owner_data->email, $subject, $Body)) {
                direct('Staff_view_requests/bus_requests');
            } else {
                die('Message could not be sent');
            }
            //------------************************------------     
                    // direct('Staff_view_requests/bus_requests');//we cant use view here bcz we are not passing any data to render the relavent page

                    // if you want to render the details page with the requested data you should pass the it to the direct page
                    // direct('Staff_view_requests/bus_requests_details?bus_no='. $bus_no);
            //------------************************------------
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

            
            $owner_data = $this->ownerModel->get_owner_email($owner_nic); ///  <------- get reciver email and name (in here get owner email and name)
                                    
                    $password = uniqid(); //generate 13 characters length password
                    $password = substr($password,-10);                     
                    $hash = password_hash($password,PASSWORD_DEFAULT);  // get the hash of the password

                   
                    $mailer = new Mailer(TAPTOBUS_EMAIL,TAPTOBUS_PASS,SITENAME);              
                    $Subject = 'Successfully added to TapToBus' ;
                    $email_data = [
                        'fname' =>$owner_data->fname,
                        'password' =>$password,
                        'type' => 'Bus owner'
                    ];
                    $Body = temporery_password_email($email_data['fname'], $email_data['password'],$email_data['type']);
 
                    if ($mailer->send($owner_data->email, $Subject,$Body)) {
                                    // if the message has been sent successfully temperory password save in owner's table
                                    // and owner data will be saved in the user table
                                $this->ownerModel->save_owner_temporery_password([
                                    'owner_nic' => $owner_nic,
                                    'password' => $hash
                                ]);
            
                                $ownerRequestDetails = $this->ownerModel->ownerRequestedDetails($owner_nic);

                                
                                $this->ownerModel->insert_into_user([

                                    'id' => $owner_nic,
                                    'fname' => $ownerRequestDetails->fname,
                                    'lname' => $ownerRequestDetails->lname,
                                    'email' => $ownerRequestDetails->email,
                                    'password_hash' => $hash,
                                    'type' => 'owner'
                                ]);
    
                                direct('Staff_view_requests/owner_requests');
    
                        } else {
                            die('Message could not be sent');
                        }            
        }

        //--------------Accept conductor requests-------------------
        public function accept_conductor_requests(){
          
            $conductor_ntc = $_GET['conductor_ntc'];
            // $owner_nic = $_GET['owner_nic'];
            $staff_no = $_SESSION['user_id'];
            
          
            $data1 = [
                'conductor_ntc'=>$conductor_ntc,
                'status' => 'accepted'
            ]; 
            
            $this->conductorModel->accept_conductor_request($data1);  // change the status pending to the accepted
            $data2 = [
                'conductor_ntc' => $conductor_ntc,
                'status' => 'accepted',
                'staff_no' => $staff_no 
            ];

            $this->conductorModel->update_staff_id_for_conductor($data2); // update the staff id in conductor requests tabel

            $conductor_data= $this->conductorModel->get_conductor_data($conductor_ntc); //<-- get conductor email and name.
            // $owner_data = $this->conductorModel->get_owner_email($owner_nic); ///  <------- get reciver email and name (in here get owner email and name)

                $password = uniqid();
                $password = substr($password , -10);
                $hash = password_hash($password , PASSWORD_DEFAULT);


                $mailer = new Mailer(TAPTOBUS_EMAIL,TAPTOBUS_PASS, SITENAME);

                // $subject1 = 'Successfully added to TapToBus';
                // $Body1= '<p> Dear '.$owner_data->fname.'! <br>'.'Your conductor <b>'.$conductor_data->fname.'</b> is successfully added to the TapToBus System' ;

                $subject = 'Successfully added to TapToBus';
                $email_data = [
                    'fname' =>$conductor_data->fname,
                    'password' =>$password,
                    'type' => 'conductor'
                ];
                $Body = temporery_password_email($email_data['fname'], $email_data['password'],$email_data['type']);


                
                // if($mailer->send($owner_data->email,$subject1,$Body1)){
                        if($mailer->send($conductor_data->email,$subject,$Body)){

                            $this->conductorModel->save_conductor_temporery_password([
                                'conductor_ntc'=>$conductor_ntc,
                                'password'=>$hash
                            ]);

                            $conductor_nic = $conductor_data->nic;
                            $driverrequestDetails = $this->conductorModel->conductorRequestedDetails($conductor_nic);


                            $this->conductorModel->insert_into_user([

                                'id'=>$driverrequestDetails->ntcNo,
                                'fname'=>$driverrequestDetails->fname,
                                'lname'=>$driverrequestDetails->lname,
                                'email'=>$driverrequestDetails->email,
                                'password_hash'=>$hash,
                                'type' => 'conductor'
                            ]);

                            direct('Staff_view_requests/conductor_requests');

                        }else{
                            die('Error');
                        }
                // }else{
                //     die('Error');
                // }
                    
        }

        // -------------Accept driver requests-----------------------
        public function accept_driver_requests(){
           
            $driver_ntc = $_GET['driver_ntc'];
            // $owner_nic = $_GET['owner_nic'];
            $staff_no = $_SESSION['user_id'];
            
          
            $data1 = [
                'driver_ntc' => $driver_ntc,
                'status' => 'accepted'
            ]; 

            $this->driverModel->accept_driver_request($data1);  

            $data2 = [
                'driver_ntc' => $driver_ntc,
                'status' => 'accepted',
                'staff_no' => $staff_no 
            ];

            $this->driverModel->update_staff_id_for_driver($data2);

            $driver_data= $this->driverModel->get_driver_data($driver_ntc); //<-- get conductor email and name.          
            // $owner_data = $this->driverModel->get_owner_email($owner_nic); ///  <------- get reciver email and name (in here get owner email and name)
          

                $password = uniqid();
                $password = substr($password , -10);
                $hash = password_hash($password , PASSWORD_DEFAULT);
              
                $mailer = new Mailer(TAPTOBUS_EMAIL,TAPTOBUS_PASS, SITENAME);

                // $subject1 = 'Successfully added to TapToBus';
                // $Body1= '<p> Dear '.$owner_data->fname.'! <br>'.'Your driver <b>'.$driver_data->fname.'</b> is successfully added to the TapToBus System' ;

                $subject = 'Successfully added to TapToBus';
                $email_data = [
                    'fname' =>$driver_data->fname,
                    'password' =>$password,
                    'type' => 'conductor'
                ];
                $Body = temporery_password_email($email_data['fname'], $email_data['password'],$email_data['type']);


                // if($mailer->send($owner_data->email,$subject1,$Body1)){
                        if($mailer->send($driver_data->email,$subject,$Body)){

                            $this->driverModel->save_driver_temporery_password([
                                'driver_ntc'=>$driver_ntc,
                                'password'=>$hash
                            ]);

                            $driver_nic = $driver_data->nic;
                            $driverrequestDetails = $this->driverModel->driverRequestedDetails($driver_nic);


                            $this->driverModel->insert_into_user([

                                'id'=>$driverrequestDetails->ntcNo,
                                'fname'=>$driverrequestDetails->fname,
                                'lname'=>$driverrequestDetails->lname,
                                'email'=>$driverrequestDetails->email,
                                'password_hash'=>$hash,
                                'type' => 'driver'
                            ]);

                            direct('Staff_view_requests/driver_requests');

                        }else{
                            die('Error');
                        }
                // }else{
                //     die('Error');
                // }                   

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

            $this->busModel->reject_bus_requests($data1); // update the bus tabel status pending --> reject

    
             //    ------- check whether the reason is empty or not ------------

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['send'])){
                    if(isset($_POST['reject_reason']) && !empty(trim($_POST['reject_reason']))){  // Check if reject_reason is set and not empty.
                        
                        // $bus_details = $this->busModel->busRequestedDetails($bus_no);
                        // $data2 = [
                        //     'bus_details' => $bus_details
                        // ];
                        // print_r($data2);

                        // $owner_nic = $data2['bus_details']->owner_nic;

                        $data3 = [
                            // 'owner_nic' => $owner_nic,
                            'staff_no' => $staff_no ,
                            'status' => 'rejected',
                            'reject_reason' =>$_POST['reject_reason']                
                        ];

                        print_r($data3);
                        die();
            
                        $this->busModel->update_staff_id_for_bus($data3); // update  the status and the staff_no on bus_request table
            
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