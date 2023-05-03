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

    // function for delete the row from the table
    public function deletestaffmembers($staff_no){
        $this->db->query('UPDATE staffmember SET status = "deleted" WHERE staff_no = :staff_no');
        $this->db->bind(":staff_no", $staff_no);
        return $this->db->execute();
    }

    //function for deleted staff member
    public function removestaffmembers(){
        $this->db->query('SELECT * FROM staffmember WHERE status = "deleted"');
        return $this->db->resultSet();
    }

    //function for update deleted staff member in to active 
    public function reset_staff_member($staff_no){
        $this->db->query("UPDATE staffmember SET status = 'active' WHERE staff_no = :staff_no");
        $this->db->bind(":staff_no", $staff_no);
        return $this->db->execute();
    }

    //search function

    public function getSearchStaffMembers($search)
      {
        $this->db->query("SELECT * FROM staffmember WHERE CONCAT(first_name,last_name) LIKE '%$search%' OR staff_no LIKE '%$search%' OR nic LIKE '%$search%' OR mobile_no LIKE '%$search' OR email LIKE '%$search'");
        $result=$this->db->resultSet();
         return $result;
      }
}
?>