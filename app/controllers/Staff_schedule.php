<?php

    class Staff_schedule  extends Controller{

        private $scheduleModel;

        public function __construct(){
            if(!isLoggedIn()){
                direct('users/login');
            }
            $this->scheduleModel = $this->model("M_staff_schedule");
        }


        public function view_schedule(){

            $schedule = $this->scheduleModel->viewSchedules();
            $this->view('staff/staff_schedule',$schedule);

        }

        // public function view_create_form(){
        //     $this->view('staff/create_schedule');
        // }

        public function create_schedule(){           

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // var_dump($_POST);
                // die();
                if(isset($_POST['createScheduleBtn'])){
                   $data = [
                        'bus_no' => $_POST['bus_no'],                    
                        'Location_from' => $_POST['location_from'],
                        'Location_to' => $_POST['location_to'],
                        'day' => $_POST['day'],
                        'arrival_time' => $_POST['arrival_time'],
                        'depature_time' => $_POST['departrue_time'],
                        'ticket_price' => $_POST['ticket_price']
                   ];                  
                }
                
                $this->scheduleModel->createSchedule($data);
                direct('Staff_schedule/view_schedule');
            }

            
        }

        public function edit_schedule(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['editScheduleBtn'])){
                    $data = [
                        'bus_no' => $_POST['bus_no'],                    
                        'Location_from' => $_POST['location_from'],
                        'Location_to' => $_POST['location_to'],
                        'day' => $_POST['day'],
                        'arrival_time' => $_POST['arrival_time'],
                        'depature_time' => $_POST['departrue_time'],
                        'ticket_price' => $_POST['ticket_price'],
                        'schedule_id' => $_POST['editScheduleBtn']
                   ];   
                }
                $this->scheduleModel->updateSchedule($data);
                direct('Staff_schedule/view_schedule');
            }
        }

        public function delete_schedule(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['deleteBtn'])){
                    $schedule_id = $_POST['deleteBtn'];
                    
                    $this->scheduleModel->deleteSchedule($schedule_id);
                    direct('Staff_schedule/view_schedule');

                }
            }
        }

    }