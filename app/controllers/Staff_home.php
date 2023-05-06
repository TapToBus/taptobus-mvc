<?php 

    class Staff_home extends Controller{

        private $staffModel;
        private $announcementModel;

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }
            
            $this->staffModel = $this->model("M_Staff");
            $this->announcementModel = $this->model("M_user_announcement");
            // this is the pages controller
        }

        public function staffhome(){
            $props = [];
            $staff_no = $_SESSION['user_id'];
            



            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if(isset($_POST['save'])){
                    if(!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["date_from"]) && !empty($_POST["date_to"]) && !empty($_POST["role"])){
                        
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        
                        $data = [
                            'staff_no' => $staff_no,
                            'title' => $_POST["title"],
                            'description' => $_POST["description"],
                            'date_from' => $_POST["date_from"],
                            'date_to' => $_POST["date_to"],
                            'title_error' => '',
                            'description_error' =>''
                        ];


                        $roles = $_POST["role"];
                        // var_dump($_POST["role"]);
                        // die();
            

                        if($this->staffModel->addNotices($data)){
                            $notice_id = $this->staffModel->getlastNoticeId()->lastId;
    
                            foreach($roles as $user){
                                $this->staffModel->addAvailableUser($user,$notice_id);
                            }

                        }
                        else {
                            // $props = ['error' => 'Invalid'];
                            $props = ['alert' =>[ 'type' => 'error', 'message' => "Invalid oparation." ]];

                        }

                    }else{
                        // should not allow to submit without filling inputs
                        if(empty($_POST['title']) || empty($_POST['description'])||empty($_POST['date_from']) || empty($_POST['date_to'])){
                            $data['error'] ='plese fill the form properly';
                        }else if(empty($_POST['title'])){                         
                            $data['title_err'] = 'Please enter a title';
                        }else if(empty($_POST['description'])){
                            $data['description_err'] = 'Please enter a description';
                        }else if(empty($_POST['date_from']) || empty($_POST['date_to'])){
                            $data['date_err'] = 'Please enter  dates properly';
                        }                      
                    }
                }   
            }

                $results = $this->staffModel->viewNotices($staff_no);

                foreach($results as $result){
                    $notice_id = $result->notice_id;
                    $availableUsers = $this->staffModel->viewAvailableUsers($notice_id);
                
                    $temp =[]; 
                    foreach($availableUsers as $availableUser) {
                        $temp[] = $availableUser->user; // append to temp array
                    }     
               
                    $result->roles = $temp; 
                }

                // obj eka associative array ekakata convert karnnama one. view eketa aniwaren pass krann one associative array ekak. obj ekak pass krann be. view ekath balannn
                $props = [
                    'result' => $results
                ];

               $this->view('staff/staffhome', $props);     // pass data to the specific view
        }

        public function deleteAnnouncement(){
            $notice_id = $_GET['notice_id'];
            print_r($notice_id);
            $this->announcementModel->deleteAnnouncementById($notice_id);
            direct('Staff_home/staffhome');    //  call the controller and specific function
        }


           /* public function editnotice(){
            $props = [];
            $staff_no = $_SESSION['user_id'];
            
           
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['notice-id'])){
                    if(!empty($_POST["edit-title"]) && !empty($_POST["edit-description"])){
                        
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        
                        $data = [
                           
                            'edit_title' => $_POST["edit-title"],
                            'edit_description' => $_POST["edit-description"],
                            'notice_id' => $_POST['notice-id'],
                            'title_error' => '',
                            'description_error' =>''

                        ];

                        if($this->staffModel->editNotice($data)){
                            // $props = ['success' => 'Added '];
                            $props = ['alert' =>[ 'type' => 'success', 'message' => "Successfully added." ]];
                        }
                        else {
                            // $props = ['error' => 'Invalid'];
                            $props = ['alert' =>[ 'type' => 'error', 'message' => "Invalid operation." ]];

                        }

                    }elseif(empty($_POST['edit-title']) || empty($_POST['edit-description'])){
                        if(empty($_POST['edit-title'])){
                            $data['title_err'] = 'Please enter a title';
                        }else{
                            $data['description_err'] = 'Please enter a description';
                        }
                         
                    }
                }   
            }

                // $result = $this->staffModel->viewNotices($staff_no);
                $result = $this->staffModel->viewNotices($staff_no);

                
                // obj eka associative array ekakata convert karnnama one. view eketa aniwaren pass krann one associative array ekak. obj ekak pass krann be. view ekath balannn
                $props = [
                    'result' => $result
                ];

               $this->view('staff/staffhome', $props);

            
        }*/

    }

?>