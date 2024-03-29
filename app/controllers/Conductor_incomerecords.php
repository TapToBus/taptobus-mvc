<?php

class Conductor_incomerecords extends Controller
{

    private $recordModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            direct('users/login');
        }

        $this->recordModel = $this->model('m_conductor_incomerecords');
    }

    public function add_incomerecords()
    {

        $new =  $this->recordModel->find_bus();
        $bus_no = $new->bus_no;
        $data1 =  $this->recordModel->view_incomerecords($bus_no);
    

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // intialize data


            $data = [
                'bus_no' => $_POST['bus_no'],
                'date' => $_POST['date'],
                'amount' => $_POST['amount'],
                'bus_no_err' => '',
                'amount_err' => '',
            ];


            if(! preg_match('/^[N][B-E]-\d{4}$/', $data['bus_no'])){
                $data['bus_no_err'] = 'A valid bus number is required';
            }

            if ( $data['amount'] < 0) {
                $data['amount_err'] = 'Please enter a valid amount';
            }

            //  if(! preg_match('/^[4-5][0-9]$|^60$/', $data['capacity'])){
            //     $data['capacity_err'] = 'A valid capacity is required';
            // }

            if (empty($data['bus_no_err']) && empty($data['amount_err'])) {

                if ($this->recordModel->add_incomerecords($data)) {
                    direct('conductor_incomerecords/add_incomerecords');
                } else {
                    die('Sorry! Something went wrong');
                }
            } else {
                // load view with errors
                $this->view('conductor/view_incomerecords', $data, $data1);
            }
        } 
        
        else {
            // intialize default values
            $data = [
                'bus_no' => '',
                'date' => '',
                'amount' => '',
                'bus_no_err' => '',
                'amount_err' => '',

            ];

            // load the view
            $this->view('conductor/view_incomerecords', $data, $data1);
        }
    }

    public function delete_incomerecords(){

        $record_id = $_GET['record_id'];
        $this->recordModel->delete_incomerecords($record_id);
        $new =  $this->recordModel->find_bus();
        $bus_no = $new->bus_no;
        $data1 =  $this->recordModel->view_incomerecords($bus_no);
        $data = [
            'bus_no' => '',
            'date' => '',
            'amount' => '',
            'bus_no_err' => '',
            'amount_err' => '',

        ];
        $this->view('conductor/view_incomerecords',$data,$data1);
    }


}
