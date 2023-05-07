<?php

class M_owner_conductors{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function register($data){

        // prepare query
        $this->db->query('INSERT INTO conductor (nic, ntcNo, fname, lname,email,mobileNo,dob,address,owner_nic) VALUES (:nic,:ntcNo, :fname, :lname,:email, :mobileNo, :dob, :address,:owner_nic)');

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

    public function view_conductors(){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE owner_nic= :nic AND status = "active"');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }
    

    public function conductor_details($con_id){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$con_id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function avail_conductors(){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE owner_nic= :nic AND (status="leave" OR status="active") AND bus_no IS NULL');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function find_conductor_ntc($con){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE fname= :fname');
        $this->db->bind(':fname',$con);
        $results = $this->db->single();
        return $results;

    }

    public function find_conductor_name($bus_no){
        // prepare query
        
        $this->db->query('SELECT * from conductor WHERE bus_no= :bus_no');
        $this->db->bind(':bus_no',$bus_no);
        $results = $this->db->single();
        return $results;

    }
    
    public function reomve_assigned_conductor($old_con){
        // prepare query
        
        $this->db->query('UPDATE conductor SET bus_no = NULL WHERE ntcNo= :con_id');
        $this->db->bind(':con_id',$old_con);   
        $this->db->execute(); 

    }

     // find conductor by nic
     public function findConByNIC($nic){
        // prepare query
        $this->db->query('SELECT * FROM conductor WHERE nic = :nic');

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


    // find conductor by email
    public function findConByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM conductor WHERE email = :email');

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

    
    //find conductor by mobile no
    public function findConByMobileNo($mobileNo){
        // prepare query
        $this->db->query('SELECT * FROM conductor WHERE mobileNo = :mobileNo');

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

    // find conductor by ntc
    public function findConByNtcNo($ntc){
        // prepare query
        $this->db->query('SELECT * FROM conductor WHERE ntcNo = :ntc');

        // bind value
        $this->db->bind(':ntc', $ntc);

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