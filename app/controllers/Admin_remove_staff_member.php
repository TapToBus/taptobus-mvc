<?php

class Admin_remove_staff_member extends Controller{

    private $pageModel;

    public function __construct()
    {
        $this->pageModel = $this->model('M_Admin_staff_member_details');
        
    }

    public function index(){

    }

    public  function view_remove_staff_member(){
        $removestaff = $this->pageModel->removestaffmembers();
        $data = ['removestaff' => $removestaff];
        $this->view('admin/remove_staff_member',$data);
    }

    public function reset_staff_member(){
        // check if button and form is work
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // check button pass the value
            if(isset($_POST['removestaffmemberbtn'])){
                $staff_no = $_POST['removestaffmemberbtn'];
                $response = $this->pageModel->reset_staff_member($staff_no);
                $this->view_remove_staff_member();
            }
        }
    }
}

?>