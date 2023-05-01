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
                'tele' => trim($_POST['tele']),

                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'tele_err' => ''
            ];

            //validate

            //validate first name
            if(! preg_match("/^[a-zA-Z]+$/", $data['firstname']) || strlen($data['firstname']) <3){
                $data['fname_err'] = "A valid first name is required";
            }

            //validate last name
            if(! preg_match("/^[a-zA-Z]+$/", $data['lastname']) || strlen($data['lastname']) < 5){
                $data['lname_err'] = "A valid last name is required";
            }

            //validate nic
            if((strlen($data['nic']) == 10 && !preg_match("/^[0-9]{9}[V]+$/", $data['nic'])) || (strlen($data['nic']) == 12 && !preg_match("/^[0-9]{12}+$/", $data['nic'])) || strlen($data['nic']) <10){
                $data['nic_err'] = "A valid NIC number is required";
            }
            else{
                if($this->addstaffmembersModel->findstaffmemberByNIC($data['nic'])){
                    $data['nic_err'] = 'NIC is already taken';
                }
            }

            //validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }
            else{
                if($this->addstaffmembersModel->findstaffmemberByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate 


            $password = uniqid(); //generate 13 characters length password
            $password = substr($password,-10);                     
            $hash = password_hash($password,PASSWORD_DEFAULT);  // get the hash of the password
            

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