<?php
class M_admin_add_staff_member{
     private $db;

     public function __construct(){
        $this->db = new Database();
     }

     public function add_staff_member($data){
        
        // insert query
        $this->db->query('INSERT INTO staffmember (staff_no,first_name,last_name,nic,dob,mobile_no,tele_no,email) VALUES( :staff_no, :first_name, :last_name, :nic, :dob, :mobile_no, :tele_no, :email)');

        // get data from controller and move to the database
        $this->db->bind(":staff_no", $data['staffid']);
        $this->db->bind(":first_name", $data['firstname']);
        $this->db->bind(":last_name", $data['lastname']);
        $this->db->bind(":nic", $data['nic']);
        $this->db->bind(":dob", $data['dob']);
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

    

    
}       
?>