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
}
?>