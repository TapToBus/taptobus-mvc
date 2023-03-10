<?php

class passenger_profile extends Controller{
    private $profileModel;
    
    public function __construct(){
        if(! isLoggedIn()){
            direct('users/login');
        }

        $this->profileModel = $this->model('m_passenger_profile');
    }

    
    public function profile(){
        $proDetails = $this->profileModel->getProfileDetails($_SESSION['user_id']);
        $totBookings = $this->profileModel->getTotalHistoryCount($_SESSION['user_id']);
        $totJourneies = $this->profileModel->getTotalJourneyCount($_SESSION['user_id']);
        $recentBooking = $this->profileModel->recentBooking($_SESSION['user_id']);
        $recentHistory = $this->profileModel->recentHistory($_SESSION['user_id']);
        
        $data = [
            'proDetails' => $proDetails,
            'totBookings' => $totBookings,
            'totJourneies' => $totJourneies,
            'recentBooking' => $recentBooking,
            'recentHistory' => $recentHistory
        ];

        $this->view('passenger/profile', $data);
    }
}