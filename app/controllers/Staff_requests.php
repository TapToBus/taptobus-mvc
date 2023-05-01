<?php

class Staff_requests extends Controller{

    private $countModel ;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->countModel = $this->model('M_staff_requests');
    }

    public function view_requests(){

        // get the pending bus counts

        $ownercount  = $this->countModel->ownerRequestscount()->pending_counts;
        $conductorcount  = $this->countModel->conductorRequestscount()->pending_counts;
        $drivercount  = $this->countModel->driverRequestscount()->pending_counts;
        $buscount  = $this->countModel->busRequestscount()->pending_counts;

        $data = [
            'ownercount' => $ownercount,
            'conductorcount' => $conductorcount,
            'drivercount' => $drivercount,
            'buscount' => $buscount
        ];   
          
        $this->view('staff/staff_requests', $data);
    }

}

?>