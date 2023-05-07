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

    // accepted counts
    public function acceptedOwnerReq(){
        $this->db->query("SELECT COUNT(request_id) as ownercount FROM owner_request where status = 'active'");
        $result = $this->db->single();
        return $result->ownercount;   // If we pass $result object alone it will give an error. we must convert it into an string

    }
    public function acceptedConductorReq(){
        $this->db->query("SELECT COUNT(request_id) as conductorcount FROM conductor_request where status = 'active'");
        $result = $this->db->single();
        return $result->conductorcount;   // If we pass $result object alone it will give an error. we must convert it into an string

    }
    public function acceptedDriverReq(){
        $this->db->query("SELECT COUNT(request_id) as drivercount FROM driver_request where status = 'active'");
        $result = $this->db->single();
        return $result->drivercount;   // If we pass $result object alone it will give an error. we must convert it into an string

    }
    public function acceptedBusReq(){
        $this->db->query("SELECT COUNT(request_id) as buscount FROM bus_request where status = 'active'");
        $result = $this->db->single();
        return $result->buscount;   // If we pass $result object alone it will give an error. we must convert it into an string

    }

}

?>