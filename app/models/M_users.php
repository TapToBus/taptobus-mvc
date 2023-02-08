<?php

class M_users{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    // register user
    public function register($username, $type, $password){
        // prepare query
        $this->db->query('INSERT INTO user(username, type, password) VALUES (:username, :type, :password)');

        // bind values
        $this->db->bind(':username', $username);
        $this->db->bind(':type', $type);
        $this->db->bind(':password', $password);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    // login user
    public function login($username, $password){
        // prepare query
        $this->db->query('SELECT * FROM user WHERE username = :username');

        // bind values
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // check password
        $hashed_password = $row->password;

        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }


    // find user by username(email)
    public function findUserByUsername($username){
        // prepare query
        $this->db->query('SELECT * FROM user WHERE username = :username');

        // bind values
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // find full record of user
    public function findUserFullRecord($email, $type){
        switch($type){
            case 'passenger': {
                // prepare relevant query
                $this->db->query('SELECT * FROM passenger WHERE email = :email');

                break;
            };

            case 'driver': {
                // prepare relevant query
                $this->db->query('SELECT * FROM driver WHERE email = :email');

                break;
            };

            case 'conductor': {
                // prepare relevant query
                $this->db->query('SELECT * FROM conductor WHERE email = :email');

                break;
            };

            case 'owner': {
                // prepare relevant query
                $this->db->query('SELECT * FROM owner WHERE email = :email');

                break;
            };

            case 'staff': {
                // prepare relevant query
                $this->db->query('SELECT * FROM staffmember WHERE email = :email');

                break;
            };

            case 'admin': {
                // prepare relevant query
                $this->db->query('SELECT * FROM admin WHERE email = :email');

                break;
            };
        }

        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }
}