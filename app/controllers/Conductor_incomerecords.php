<?php

class Conductor_incomerecords extends Controller{

    private $recordModel;

    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

          $this->recordModel = $this->model('m_conductor_incomerecords');
         
    }

    public function add_incomerecords(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // intialize data

            
            $data = [
                'bus_no' => $_POST['bus_no'],
                'date' => $_POST['date'],
                'amount' => $_POST['amount'],
                'bus_no_err' => '',
                'date_err' => '',
                'amount_err' => '',
            ];

         
            // if(! preg_match('/^[N][B-E]-\d{4}$/', $data['bus_no'])){
            //     $data['bus_no_err'] = 'A valid bus number is required';
            // }else{
            //     if($this->ownerModel->findOwnerByBusNo($data['bus_no'])){
            //         $data['bus_no_err'] = 'Bus No is already used';
            //     }
            // }

        
            // if(! preg_match('/^[E]-[1-6]$/', $data['root_no'])){ 
            //     $data['root_no_err'] = 'A valid root number is required';
            // }
   
            //  if(! preg_match('/^[4-5][0-9]$|^60$/', $data['capacity'])){
            //     $data['capacity_err'] = 'A valid capacity is required';
            // }

            if(empty($data['bus_no_err'])&&empty($data['date_err'])&&empty($data['amount_err']))

             {

                if( $this->recordModel->add_incomerecords($data)){
                     direct('conductor_incomerecords/add_incomerecords');
                }
                else{
                     die('Sorry! Something went wrong');
                }
             }

             else{
                // load view with errors
                $this->view('conductor/view_incomerecords', $data);
    
            }
        }
        
        else{
            // intialize default values
            $data = [
                'bus_no' => '',
                'date' => '',
                'amount' => '',
                'bus_no_err' => '',
                'date_err' => '',
                'amount_err' => '',
            
            ];

            // load the view
            $this->view('conductor/view_incomerecords', $data);
        }

       
    
    }

    // public function view_incomerecords(){

    //     $data = $this->recordModel->view_incomerecords();
    //     $this->view('conductor/view_incomerecords',$data);
    
    // }


}

?>