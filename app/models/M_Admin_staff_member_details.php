<?php

class M_Admin_staff_member_details{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getstaffmembers(){
        $this->db->query('SELECT * FROM staffmember WHERE status = "active"');

        return $this->db->resultSet();
    }

    public function removestaffmembers(){
        $this->db->query('SELECT * FROM staffmember WHERE status = "pending"');
        return $this->db->resultSet();
    }

    public function reset_staff_member($staff_no){
        $this->db->query("UPDATE staffmember SET status = 'active' WHERE staff_no = :staff_no");
        $this->db->bind(":staff_no", $staff_no);
        return $this->db->execute();
    }
}
?>