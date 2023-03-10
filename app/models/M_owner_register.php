<?php

class M_owner_register{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }


    // register passenger
    public function register($data){
        // prepare query
        $this->db->query('INSERT INTO owner (nic, fname, lname,email,mobileNo,password) VALUES (:nic, :fname, :lname,:email, :mobileNo, :password)');

        // bind values
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
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


    // find owner by nic
    public function findOwnerByNIC($nic){
        // prepare query
        $this->db->query('SELECT * FROM owner WHERE nic = :nic');

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


    // find owner by email
    public function findOwnerByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM owner WHERE email = :email');

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

    
    //find passenger by mobile no
    public function findOwnerByMobileNo($mobileNo){
        // prepare query
        $this->db->query('SELECT * FROM owner WHERE mobileNo = :mobileNo');

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

?>