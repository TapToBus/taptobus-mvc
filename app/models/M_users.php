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
            switch($row->type){
                case 'passenger': {
                    $this->db->query('SELECT * FROM passenger WHERE email = :username');
                }

                // other user queries goes here
            }

            // bind values
            $this->db->bind(':username', $username);

            $result = $this->db->single();
            
            return $result;
        }else{
            return false;
        }
    }


    // find user by username
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
}