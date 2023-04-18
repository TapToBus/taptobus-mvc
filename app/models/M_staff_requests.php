<?php
class M_staff_requests{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    //-------------- get pending requests --------------
    public function ownerRequests(){
        $this->db->query("SELECT nic, fname, lname, email, mobileNo FROM owner where status = 'pending' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function driverRequests(){
        
        $this->db->query("SELECT ntcNo, nic, fname, lname, email, mobileNo FROM driver where status = 'pending'");
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

    public function ownerRequestedDetails($owner_nic){
        $this->db->query("SELECT nic, fname, lname, email, pic, mobileNo FROM owner where nic = :owner_nic");
        $this->db->bind(":owner_nic",$owner_nic);
        $result = $this->db->Single();
        return $result;
    }

    public function busRequestedDetails($bus_no){
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic FROM bus where bus_no = :bus_no ");
        $this->db->bind(":bus_no",$bus_no);
        $result = $this->db->Single();
        return $result;
    }

    public function conductorRequestedDetails($conductor_nic){
        $this->db->query("SELECT nic , fname, lname, email, pic, mobileNo ,ntcNo ,owner_nic  FROM conductor WHERE nic = :conductor_nic");
        $this->db->bind(":conductor_nic",$conductor_nic);
        $result = $this->db->Single();
        return $result;
    }

    public function driverRequestedDetails($driver_nic){
        $this->db->query("SELECT nic , fname, lname, email, pic, mobileNo , ntcNo, owner_nic FROM driver where nic = :driver_nic");
        $this->db->bind(":driver_nic",$driver_nic);
        $result = $this->db->Single();
        return $result;
    }


    //---------------Accept requests-----------------
    public function accept_bus_request($data1){
        $this->db->query("UPDATE bus set status = :sts where bus_no = :bus_no");
        $this->db->bind(":bus_no",$data1['bus_no']);
        $this->db->bind(":sts",$data1['status']);

        return $this->db->execute();
    }

    public function accept_owner_request($data1){
        $this->db->query("UPDATE owner set status = :sts where nic = :owner_nic");
        $this->db->bind(":owner_nic",$data1['owner_nic']);
        $this->db->bind(":sts",$data1['status']);

        return $this->db->execute();
    }

    public function accept_driver_request($data1){
        $this->db->query("UPDATE driver set status = :sts where ntcNo = :driver_ntc");
        $this->db->bind(":driver_ntc",$data1['driver_ntc']);
        $this->db->bind(":sts",$data1['status']);

        return $this->db->execute();
    }

    public function accept_conductor_request($data1){
        $this->db->query("UPDATE conductor set status = :sts where ntcNo = :conductor_ntc");
        $this->db->bind(":conductor_ntc",$data1['conductor_ntc']);
        $this->db->bind(":sts",$data1['status']);

        return $this->db->execute();
    }
    // ---------------Update staff id----------------

    public function update_staff_id_for_bus($data2){
        $this->db->query("UPDATE bus_request set staff_no = :staff_no, status = :status  where bus_no = :bus_no");
        $this->db->bind(":staff_no", $data2['staff_no']);
        $this->db->bind(":bus_no", $data2['bus_no']); 
        $this->db->bind(":status", $data2['status']);

        return $this->db->execute();
    }

    public function update_staff_id_for_owner($data2) {
        $this->db->query("UPDATE owner_request set staff_no = :staff_no, status = :status WHERE owner_nic = :owner_nic");
        $this->db->bind(":status", $data2['status']);
        $this->db->bind(":staff_no", $data2['staff_no']);
        $this->db->bind(":owner_nic", $data2['owner_nic']);

        return $this->db->execute();
    }

    public function update_staff_id_for_conductor($data2){
        $this->db->query("UPDATE conductor_request set staff_no = :staff_no, status = :status WHERE conductor_ntc = :conductor_ntc");
        $this->db->bind(":status",$data2['status']);
        $this->db->bind(":staff_no", $data2['staff_no']);
        $this->db->bind(":conductor_ntc", $data2['conductor_ntc']);

        return $this->db->execute();

    }

    public function update_staff_id_for_driver($data2){
        $this->db->query("UPDATE driver_request set staff_no = :staff_no, status = :status WHERE driver_ntc = :driver_ntc");
        $this->db->bind(":status",$data2['status']);
        $this->db->bind(":staff_no", $data2['staff_no']);
        $this->db->bind(":driver_ntc", $data2['driver_ntc']);

        return $this->db->execute();

    }



    // ------------- get owner's email ----------
    
    public function get_owner_email($owner_nic) {
        $this->db->query("SELECT email, fname, lname FROM owner WHERE nic = :owner_nic");
        $this->db->bind(":owner_nic",$owner_nic);
        $result = $this->db->Single();
        return $result;
    }

    //---------------------Reject requests -----------

    public function reject_bus_requests($data1) {
        $this->db->query("UPDATE bus set status = :sts where bus_no= :bus_no");
        $this->db->bind(":bus_no", $data1['bus_no']);
        $this->db->bind(":sts", $data1['status']);

        return$this->db->execute();
    }

}

?>