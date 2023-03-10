<?php
class M_staff_requests{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ownerRequests(){
        $this->db->query("SELECT nic, fname, lname, email, mobileNo FROM owner where status = 'pending' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function driverRequests(){
        $this->db->query("SELECT ntcNo, nic, fname, lname, email, mobileNo FROM driver where status = 'pending ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function conductorRequests(){
        $this->db->query("SELECT ntcNo, nic, fname, lname, email, mobileNo FROM conductor where status = 'pending' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function busRequests(){
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic FROM bus where status = 'pending' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function busRequestedDetails($bus_no){
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic FROM bus where bus_no = :bus_no ");
        $this->db->bind(":bus_no",$bus_no);
        $result = $this->db->Single();
        return $result;
    }
}

?>