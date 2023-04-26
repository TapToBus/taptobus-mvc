<?php
class Admin_dashboard extends Controller{

    private $pageModelUserCount ;

    public function __construct()
    {
        $this->pageModelUserCount = $this->model('M_Admin_dashboard');
        // check if admin is logined to the system

        if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin'){
            direct('user/logout');  
        }
        
    }

    public function view_admin_dashboard(){

        $data1= $this->pageModelUserCount->get_user_count();

        $data = [
            'user_count' => $data1->user_count
        ];


        $this->view('admin/view_dashboard', $data);

    }
}

?>