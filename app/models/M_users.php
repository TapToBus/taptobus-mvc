<?php

class M_users{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }


    // add user to the user table
    public function addUser($id, $fname, $lname, $email, $password_hash, $type){
        // prepare query
        $this->db->query('INSERT INTO user (id, fname, lname, email, password_hash, type)
        VALUES (:id, :fname, :lname, :email, :password_hash, :type);');

        // bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':fname', $fname);
        $this->db->bind(':lname', $lname);
        $this->db->bind(':email', $email);
        $this->db->bind(':password_hash', $password_hash);
        $this->db->bind(':type', $type);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    // login user
    public function login($email, $password){
        // prepare query
        $this->db->query('SELECT * FROM user WHERE email = :email');

        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check password
        $hashed_password = $row->password_hash;
        // echo $hashed_password;
        // echo $password;
        // echo password_verify($password, $hashed_password);
        // die();
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }


    // find user by email
    public function findUserByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM user WHERE email = :email');

        // bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    public function findUserDetails($email){
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);

        return $this->db->single();
    }


    public function setUserOTP($id, $otp){
        $this->db->query('UPDATE user SET otp=:otp WHERE id=:id;');
        $this->db->bind(':otp', $otp);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }


    public function getUserDetails($id){
        $this->db->query('SELECT * FROM user WHERE id=:id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }


    public function updateUserPassword($id, $pwd){
        $this->db->query('UPDATE user SET password_hash=:pwd WHERE id=:id;');
        $this->db->bind(':pwd', $pwd);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }


    public function updateRelevantUserTable($id, $pwd, $type){
        switch($type){
            case 'passenger': {
                $this->db->query('UPDATE passenger SET password_hash=:pwd WHERE nic=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }

            case 'staff': {
                $this->db->query('UPDATE staffmember SET password_hash=:pwd WHERE staff_no=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }

            case 'driver': {
                $this->db->query('UPDATE driver SET password=:pwd WHERE ntcNo=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }

            case 'conductor': {
                $this->db->query('UPDATE conductor SET password=:pwd WHERE ntcNo=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }

            case 'owner': {
                $this->db->query('UPDATE owner SET password=:pwd WHERE nic=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }

            case 'admin': {
                $this->db->query('UPDATE admin SET password=:pwd WHERE admin_id=:id;');
                $this->db->bind(':pwd', $pwd);
                $this->db->bind(':id', $id);
                break;
            }
        }

        return $this->db->execute();
    }
}