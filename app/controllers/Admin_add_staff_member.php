<?php
class Admin_add_staff_member extends Controller
{

    private $addstaffmembersModel;
    private $userModel;

    public function __construct()
    {

        $this->addstaffmembersModel =  $this->model('M_admin_add_staff_member');
        $this->userModel = $this->model('M_users');


        // check if admin is logined to the system
        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
            direct('user/logout');
        }
    }

    public function add_staff_member()
    {

        $data = [
            'fname_err' => '',
            'lname_err' => '',
            'nic_err' => '',
            'email_err' => '',
            'mobile_err' => '',
            'tele_err' => ''
        ];
        $this->view('admin/add_new_staff_member', $data);

    }

    public function insert_new_staff_member()
    {

        //check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //get the data from array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'staffid' => trim($_POST['staff_id']),
                'firstname' => trim($_POST['first_name']),
                'lastname' => trim($_POST['last_name']),
                'nic' => trim($_POST['nic']),
                // 'dob' => trim($_POST['dob']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'tele' => trim($_POST['tele']),

                'fname_err' => '',
                'lname_err' => '',
                'nic_err' => '',
                'email_err' => '',
                'mobile_err' => '',
                'tele_err' => ''
            ];

            //validate

            //validate first name
            if (!preg_match("/^[a-zA-Z]+$/", $data['firstname']) || strlen($data['firstname']) < 3) {
                $data['fname_err'] = "A valid first name is required";
            }

            //validate last name
            if (!preg_match("/^[a-zA-Z]+$/", $data['lastname']) || strlen($data['lastname']) < 5) {
                $data['lname_err'] = "A valid last name is required";
            }

            //validate nic
            if ((strlen($data['nic']) == 10 && !preg_match("/^[0-9]{9}[V]+$/", $data['nic'])) || (strlen($data['nic']) == 12 && !preg_match("/^[0-9]{12}+$/", $data['nic'])) || strlen($data['nic']) < 10) {
                $data['nic_err'] = "A valid NIC number is required";
            } else {
                if ($this->addstaffmembersModel->findstaffmemberByNIC($data['nic'])) {
                    $data['nic_err'] = 'NIC is already taken';
                }
            }

            //validate email
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = "A valid email is required";
            } else {
                if ($this->addstaffmembersModel->findstaffmemberByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate mobile number
            if (!preg_match('/^[0-9]{10}+$/', $data['mobile'])) {
                $data['mobile_err'] = 'A valid mobile no is required';
            } else {
                if ($this->addstaffmembersModel->findstaffmemberByMobileNo($data['mobile'])) {
                    $data['mobile_err'] = 'Mobile no is already taken';
                }
            }

            //validate telephone number
            if (!preg_match('/^[0-9]{10}+$/', $data['tele'])) {
                $data['tele_err'] = 'A valid telephone no is required';
            } else {
                if ($this->addstaffmembersModel->findstaffmemberByTeleNo($data['tele'])) {
                    $data['tele_err'] = 'telephone no is already taken';
                }
            }


            $staffmemberemail = $_POST['email'];
            $fname = $_POST['first_name'];
            $password = uniqid(); //generate 13 characters length password
            $password = substr($password, -10);
            $hash = password_hash($password, PASSWORD_DEFAULT);  // get the hash of the password



            if (empty($data['fname_err']) && empty($data['lname_err']) && empty($data['nic_err']) && empty($data['email_err']) && empty($data['mobile_err']) && empty($data['tele_err'])) {



                if ($this->addstaffmembersModel->add_staff_member($data)) {
                    // direct('Admin_view_user_dashboard/view_staff_member');

                    if ($this->userModel->addUser($data['staffid'], $data['firstname'], $data['lastname'], $data['email'], $hash, 'staff')) {

                        $mailer = new Mailer(TAPTOBUS_EMAIL, TAPTOBUS_PASS, SITENAME);

                        $Subject = 'Successfully added to TapToBus';

                        $email_data = [
                            'fname' => $fname,
                            'password' => $password,
                            'type' => 'staff member'
                        ];

                        //email body
                        $Body = staff_temporery_password_email($email_data['fname'], $email_data['password'], $email_data['type']);

                        if ($mailer->send($staffmemberemail, $Subject, $Body)) {

                            // die("successfully send");
                            direct('Admin_view_user_dashboard/view_staff_member');
                        } else {
                            die("Mail failed to send");
                        }
                    }

                }
            }

            else{

                $this->view('admin/add_new_staff_member', $data);

            }
        }
    }
}

?>



