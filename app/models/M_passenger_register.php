<?php

class M_passenger_register{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }


    // register passenger
    public function register($data){
        // prepare query
        $this->db->query('INSERT INTO passenger(nic, fname, lname, email, mobileNo, password) VALUES (:nic, :fname, :lname, :email, :mobileNo, :password)');

        // bind values
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobileNo', $data['mobileNo']);
        $this->db->bind(':password', $data['password']);

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
    public function findPassengerByMobileNo($mobileNo){
        // prepare query
        $this->db->query('SELECT * FROM passenger WHERE mobileNo = :mobileNo');

        // bind value
        $this->db->bind(':mobileNo', $mobileNo);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}