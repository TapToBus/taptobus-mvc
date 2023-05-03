<?php   
    class Staff_dashboard extends Controller {

        private $dashboard_model;

        public function __construct()
        {
              if(! isLoggedIn()){
                direct('users/login');
            }   
            $this->dashboard_model = $this->model('M_staff_dashboard');           
        }

        public function staff_dash(){

            $status = "active";
            $no_of_total_users = $this->dashboard_model->getTotalUsers();
            $no_of_buses = $this->dashboard_model->getTotalBusses($status)->num_buses;
            $no_of_owners = $this->dashboard_model->getTotalOwners($status)->num_owners;
            $no_of_drivers = $this->dashboard_model->getTotalDrivers($status)->num_drivers;
            $no_of_conductors = $this->dashboard_model->getTotalConductors($status)->num_conductors;

            $data = [
                'no_of_total_users' => $no_of_total_users,
                'no_of_buses' => $no_of_buses,
                'no_of_owners' => $no_of_owners,
                'no_of_drivers' => $no_of_drivers,
                'no_of_conductors' => $no_of_conductors
            ];
            
        
            $this->view('staff/staff_dashboard',$data);
        }

        public function current_user_doughnut_chart(){
            $user_count_by_type =$this->dashboard_model->currentUsersDoughnutChart();
            //convert php object to json object
            echo json_encode($user_count_by_type);
        }

        public function user_population_line_chart(){
            $user_count_by_type = $this->dashboard_model->currentUsersLineChart();
            //convert php object to json object
            echo json_encode($user_count_by_type);
        }

    }

    ?>