<?php

class M_owner_drivers{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function register($data){

        // prepare query
        $this->db->query('INSERT INTO driver (nic, ntcNo, fname, lname,email,mobileNo,dob,address,owner_nic) VALUES (:nic,:ntcNo, :fname, :lname,:email, :mobileNo, :dob, :address,:owner_nic)');

        $id = $_SESSION['user_id'];
        // bind values
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':ntcNo', $data['ntcNo']);
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobileNo', $data['mobileNo']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':owner_nic', $id);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function view_drivers(){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE owner_nic= :nic AND status = "active"');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }
    

    public function driver_details($dr_id){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$dr_id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function avail_drivers(){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE owner_nic= :nic AND (status="leave" OR status="active") AND bus_no IS NULL');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function find_driver_ntc($dr){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE fname= :fname');
        $this->db->bind(':fname',$dr);
        $results = $this->db->single();
        return $results;

    }

    public function find_driver_name($bus_no){
        // prepare query
        
        $this->db->query('SELECT * from driver WHERE bus_no= :bus_no');
        $this->db->bind(':bus_no',$bus_no);
        $results = $this->db->single();
        return $results;

    }
    
    public function reomve_assigned_driver($old_dr){
        // prepare query
        
        $this->db->query('UPDATE driver SET bus_no = NULL WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$old_dr);   
        $this->db->execute(); 

    }

     // find driver by nic
     public function findDrByNIC($nic){
        // prepare query
        $this->db->query('SELECT * FROM driver WHERE nic = :nic');

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


    // find driver by email
    public function findDrByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM driver WHERE email = :email');

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

    
    //find driver by mobile no
    public function findDrByMobileNo($mobileNo){
        // prepare query
        $this->db->query('SELECT * FROM driver WHERE mobileNo = :mobileNo');

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