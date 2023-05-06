<?php

class M_admin_profile{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAdminProfileDetails($admin_id){
        $this->db->query('SELECT * FROM admin WHERE admin_id = :admin_id;');

        $this->db->bind(':admin_id',$admin_id);

        $result= $this->db->single();

        return $result;
    }


        // find staff member by mobile no
    public function findAdminByMobileNo($mobile){
        // prepare query
        $this->db->query('SELECT * FROM admin WHERE mobileNo = :mobile_no');

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
    public function findAdminByTeleNo($tele){
        // prepare query
        $this->db->query('SELECT * FROM admin WHERE telNo = :tele_no');

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

    public function update_profile($data){

        $this->db->query("UPDATE admin SET fname = ':firstname' , lname = ':lastname', mobileNo = ':mobile' , teleNo = ':tele' WHERE admin_id = :admin_id");
        $this->db->bind(":firstname", $data['fistname']);
        $this->db->bind(":lastname", $data['lastname']);
        $this->db->bind(":mobile", $data['mobile']);
        $this->db->bind(":tele", $data['tele']);
        $this->db->bind(":admin_id", $data['admin_id']);

        return $this->db->execute();

    }
}


?>