<?php
    class Admin_view_bus_owner extends Controller{

        private $pagesModel;

        public function __construct()
        {
            if(! isLoggedIn()){
                direct('users/login');
            }
            
            $this->pagesModel = $this->model('M_Admin_bus_owner_details');
            
        }

        public function index(){

        }

        public function view_bus_owner(){
            
            $owners = $this->pagesModel->getowners();

            $data = [

                'owners' => $owners

            ];

            $this->view('admin/view_bus_owner', $data);

        }

    }

?>