<?php
class M_staff_profile{
    private $db;

    public function __construct(){
        $this->db = new Database ;

    }

    public function getStaffdetails($staff_no){
        $this->db->query("SELECT * FROM staffmember where staff_no = :staff_no");
        $this->db->bind(':staff_no' , $staff_no);
        $result = $this->db->single();

        return $result;
    }

}

?>