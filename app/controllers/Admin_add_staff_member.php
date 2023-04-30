<?php
class Admin_add_staff_member extends Controller{

    private $addstaffmembersModel;

    public function __construct()
    {
        
        $this->addstaffmembersModel =  $this->model('M_admin_add_staff_member');

        // check if admin is logined to the system
        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');  
        }
        
    }

    public function add_staff_member(){
        $this->view('admin/add_new_staff_member');
    }

    public function insert_new_staff_member(){

        //check if form is submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //get the data from array
            $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            $data=[
                'staffid' => trim($_POST['staff_id']),
                'firstname' => trim($_POST['first_name']),
                'lastname' => trim($_POST['last_name']),
                'nic' => trim($_POST['nic']),
                'dob' => trim($_POST['dob']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'tele' => trim($_POST['tele'])
            ];

            if($this->addstaffmembersModel->add_staff_member($data)){
                direct('Admin_view_user_dashboard/view_staff_member');
            }

        }

    }
}

?>



<?php
// class Admin_add_staff_member extends Controller{

//     private $staffmembermodel;

//     public function __construct()
//     {
//         if(!isLoggedIn()){
//             direct('users/login');
//         }
        
//         // staff model get from model to staffmembermodel variable 
//         $this->staffmembermodel = $this->model("M_Admin_add_staff_member");
        
        
//     }

//     public function add_staff_member(){

//         if($_SERVER["REQUEST_METHOD"] == "POST"){
//             if(isset($_POST['save'])){
//                 if(!empty($_POST["admin_id"]) && !empty($_POST["name"])){
//                     $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
//                     $data = [
//                         'staff_id'=>$_POST["staff_id"],
//                         'nic'=>$_POST["nic"],
//                         'first_name'=>$_POST["firstname"],
//                         'last_name'=>$_POST["lastname"],
//                         'dob'=>$_POST["dob"],
//                         'address'=>$_POST["address"],
//                         'email'=>$_POST["email"],
//                         'mobile'=>$_POST["mobile"],
//                         'tele'=>$_POST["tele"],
//                     ];

                    
//                 }
//             }
//         }
//     }
// }    

?>