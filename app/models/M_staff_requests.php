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

    //---------------get Request details----------------
    public function busRequestedDetails($bus_no){
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic FROM bus where bus_no = :bus_no ");
        $this->db->bind(":bus_no",$bus_no);
        $result = $this->db->Single();
        return $result;
    }


    //---------------Accept requests-----------------
    public function accept_bus_request($data){
        $this->db->query("UPDATE bus set status = :sts where bus_no = :bus_no");
        $this->db->bind(":bus_no",$data['bus_no']);
        $this->db->bind(":sts",$data['status']);

        return $this->db->execute();
    }



    // ---------------Update staff id----------------

    public function update_staff_id($data2){
        $this->db->query("UPDATE bus_request set staff_no = :staff_no, status = :status where owner_nic = :owner_nic");
        $this->db->bind(":staff_no", $data2['staff_no']);
        $this->db->bind(":owner_nic", $data2['owner_nic']); 
        $this->db->bind(":status", $data2['status']);

        return $this->db->execute();
    }

    

}

?>