<?php
class Admin_dashboard extends Controller{

    public function __construct()
    {
        
    }

    public function view_admin_dashboard(){

        $this->view('admin/view_dashboard');

    }
}

?>