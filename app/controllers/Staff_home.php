<?php 

    class Staff_home extends Controller{

        private $staffModel;

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }
            
            $this->staffModel = $this->model("M_Staff");
            // this is the pages controller
        }

        public function staffhome(){
            
            $staff_no = $_SESSION['user_id'];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['save'])){
                    if(!empty($_POST["title"]) && !empty($_POST["description"])){
                        
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        
                       
                        
                        $data = [
                            'staff_no' => $staff_no,
                            'title' => $_POST["title"],
                            'description' => $_POST["description"],
                            'date_from' => $_POST["date_from"],
                            'date_to' => $_POST["date_to"],
                        ];

                        if($this->staffModel->addNotices($data)){
                            $msg = ['success' => 'Added '];
                        }
                        else {
                            $msg = ['error' => 'Invalid'];
                        }

                        $this->view('staff/staffhome', $msg);
                    }
                }   
            }else {

                

                $result = $this->staffModel->viewNotices($staff_no);
                

                // obj eka associative array ekakata convert karnnama one. view eketa aniwaren pass krann one associative array ekak. obj ekak pass krann be. view ekath balannn
                $data = [
                    'result' => $result
                ];

               $this->view('staff/staffhome', $data);

            }
        }

    }

?>