<?php
class M_admin_add_staff_member{
     private $db;

     public function __construct(){
        $this->db = new Database();
     }

     public function add_staff_member($data){
        
        // insert query
        $this->db->query('INSERT INTO staffmember (staff_no,first_name,last_name,nic,mobile_no,tele_no,email) VALUES( :staff_no, :first_name, :last_name, :nic, :mobile_no, :tele_no, :email)');

        // get data from controller and move to the database
        $this->db->bind(":staff_no", $data['staffid']);
        $this->db->bind(":first_name", $data['firstname']);
        $this->db->bind(":last_name", $data['lastname']);
        $this->db->bind(":nic", $data['nic']);
        $this->db->bind(":mobile_no", $data['mobile']);
        $this->db->bind(":tele_no", $data['tele']);
        $this->db->bind(":email", $data['email']);

        // check if query is execute
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
     }

     //find staff member by nic
     public function findstaffmemberByNIC($nic){

        //prepare query
        $this->db->query("SELECT * FROM staffmember WHERE nic = :nic");

        //bind value
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();

        //check row is eexist or not
        if($this->db->rowCount() >0){
            return true;
        }
        else{
            return false;
        }
     }

     // find staff member by email
    public function findstaffmemberByEmail($email){
        // prepare query
        $this->db->query('SELECT * FROM staffmember WHERE email = :email');

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
    
    // find staff member by mobile no
    public function findstaffmemberByMobileNo($mobile){
        // prepare query
        $this->db->query('SELECT * FROM staffmember WHERE mobile_no = :mobile_no');

        // bind value
        $this->db->bind(':mobile_no', $mobile);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    // find staff member by telephone no
    public function findstaffmemberByTeleNo($tele){
        // prepare query
        $this->db->query('SELECT * FROM staffmember WHERE tele_no = :tele_no');

        // bind value
        $this->db->bind(':tele_no', $tele);

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