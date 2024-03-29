<?php

class M_passenger_register{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }


    // register passenger
    public function register($data){
        // prepare query
        $this->db->query('INSERT INTO passenger(nic, fname, lname, email, mobile_no, password_hash, joined_datetime)
        VALUES (:nic, :fname, :lname, :email, :mobile_no, :password_hash, CURRENT_TIMESTAMP)');

        // bind values
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile_no', $data['mobileNo']);
        $this->db->bind(':password_hash', $data['password']);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    // find passenger by nic
    public function findPassengerByNIC($nic){
        // prepare query
        $this->db->query('SELECT * FROM passenger WHERE nic = :nic');

        // bind value
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    // find passenger by email
    public function findPassengerByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM passenger WHERE email = :email');

        // bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    
    // find passenger by mobile no
    public function findPassengerByMobileNo($mobile_no){
        // prepare query
        $this->db->query('SELECT * FROM passenger WHERE mobile_no = :mobile_no');

        // bind value
        $this->db->bind(':mobile_no', $mobile_no);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    // set passenger OTP
    public function setPassengerOTP($passenger_nic, $otp){
        $this->db->query('UPDATE passenger SET otp = :otp WHERE nic = :passenger_nic;');
        $this->db->bind(':otp', $otp);
        $this->db->bind(':passenger_nic', $passenger_nic);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getPassengerDetails($passenger_nic){
        $this->db->query('SELECT * FROM passenger WHERE nic = :passenger_nic');
        $this->db->bind(':passenger_nic', $passenger_nic);

        return $this->db->single();
    }


    public function activePassenger($passenger_nic){
        // $this->db->query('UPDATE passenger SET status = :status WHERE nic = :passenger_nic');
        $this->db->query('UPDATE passenger SET status = :status, joined_datetime = CURRENT_TIMESTAMP WHERE nic = :passenger_nic');
        $this->db->bind(':status', 'active');
        $this->db->bind(':passenger_nic', $passenger_nic);

        return $this->db->execute();
    }
}