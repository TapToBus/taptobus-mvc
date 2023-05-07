<?php
class M_staff_requests{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    //-------------- get pending requests --------------
    public function ownerRequests(){
        $this->db->query("SELECT owner_nic, DATE(date_and_time) AS date, TIME(date_and_time) AS time FROM owner_request where status = 'pending' order by date_and_time asc");
        $result = $this->db->resultSet();
        return $result;
    }

    public function driverRequests(){
        
        $this->db->query("SELECT driver_ntc , DATE(date_and_time) AS date , TIME(date_and_time) AS time FROM driver_request where status = 'pending' order by date_and_time asc");
        $result = $this->db->resultSet();
        return $result;
    }

    public function conductorRequests(){
        $this->db->query("SELECT conductor_ntc , DATE(date_and_time) AS date, TIME(date_and_time) AS time FROM conductor_request where status = 'pending'order by date_and_time asc ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function busRequests(){
        $this->db->query("SELECT bus_no , DATE(date_and_time) AS date , TIME(date_and_time) AS time FROM bus_request where status = 'pending' order by date_and_time asc");
        $result = $this->db->resultSet();
        return $result;
    }
    // --------------------- get pending request count --------------
    public function ownerRequestscount() {
        $this->db->query("SELECT COUNT(*) AS pending_counts from owner_request WHERE status = 'pending'");
        $result = $this->db->single();
        return $result;
    }
    public function conductorRequestscount() {
        $this->db->query("SELECT COUNT(*) AS pending_counts from conductor_request WHERE status = 'pending'");
        $result = $this->db->single();
        return $result;
    }
    public function driverRequestscount() {
        $this->db->query("SELECT COUNT(*) AS pending_counts from driver_request WHERE status = 'pending'");
        $result = $this->db->single();
        return $result;
    }
    public function busRequestscount() {
        $this->db->query("SELECT COUNT(*) AS pending_counts from bus_request WHERE status = 'pending'");
        $result = $this->db->single();
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
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic, permit_image FROM bus where bus_no = :bus_no ");
        $this->db->bind(":bus_no",$bus_no);
        $result = $this->db->Single();
        return $result;
    }

    public function conductorRequestedDetails($conductor_ntc){
        $this->db->query("SELECT nic , fname, lname, email, pic, mobileNo ,ntcNo ,owner_nic FROM conductor WHERE ntcNo = :conductor_ntc");
        $this->db->bind(":conductor_ntc",$conductor_ntc);
        $result = $this->db->Single();
        return $result;
    }

    public function driverRequestedDetails($driver_ntc){
        $this->db->query("SELECT nic , fname, lname, email, pic, mobileNo , ntcNo, owner_nic FROM driver where ntcNo = :driver_ntc");
        $this->db->bind(":driver_ntc",$driver_ntc);
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

    public function update_staff_id_for_bus($data){
        $this->db->query("UPDATE bus_request set staff_no = :staff_no, status = :status, reject_reason = :reject_reason  where bus_no = :bus_no");
        $this->db->bind(":staff_no", $data['staff_no']);
        $this->db->bind(":bus_no", $data['bus_no']); 
        $this->db->bind(":status", $data['status']);
        $this->db->bind(":reject_reason", $data['reject_reason']);

        return $this->db->execute();
    }

    public function update_staff_id_for_owner($data) {
        $this->db->query("UPDATE owner_request set staff_no = :staff_no, status = :status , reject_reason = :reject_reason  WHERE owner_nic = :owner_nic");
        $this->db->bind(":status", $data['status']);
        $this->db->bind(":staff_no", $data['staff_no']);
        $this->db->bind(":owner_nic", $data['owner_nic']);
        $this->db->bind(":reject_reason", $data['reject_reason']);


        return $this->db->execute();
    }

    public function update_staff_id_for_conductor($data){
        $this->db->query("UPDATE conductor_request set staff_no = :staff_no, status = :status,  reject_reason = :reject_reason  WHERE conductor_ntc = :conductor_ntc");
        $this->db->bind(":status",$data['status']);
        $this->db->bind(":staff_no", $data['staff_no']);
        $this->db->bind(":conductor_ntc", $data['conductor_ntc']);
        $this->db->bind(":reject_reason", $data['reject_reason']);


        return $this->db->execute();

    }

    public function update_staff_id_for_driver($data){
        $this->db->query("UPDATE driver_request set staff_no = :staff_no, status = :status , reject_reason = :reject_reason WHERE driver_ntc = :driver_ntc");
        $this->db->bind(":status",$data['status']);
        $this->db->bind(":staff_no", $data['staff_no']);
        $this->db->bind(":driver_ntc", $data['driver_ntc']);
        $this->db->bind(":reject_reason", $data['reject_reason']);


        return $this->db->execute();

    }


// ----------------for email ------------------

                // ------------- get owner's data ----------
                
                public function get_owner_data($owner_nic) {
                    $this->db->query("SELECT email, fname, lname FROM owner WHERE nic = :owner_nic");
                    $this->db->bind(":owner_nic",$owner_nic);
                    $result = $this->db->Single();
                    return $result;
                }

                //------------get conductor's data -----------

                public function get_conductor_data($conductor_ntc) {
                    $this->db->query("SELECT nic , fname, lname, email from conductor where ntcNo = :conductor_ntc");
                    $this->db->bind(":conductor_ntc",$conductor_ntc);
                    $result = $this->db->Single();
                    return $result;
                }

                //---------get driver's data------------------------

                public function get_driver_data($driver_ntc) {
                    $this->db->query("SELECT nic , fname , lname, email from driver where ntcNo = :driver_ntc");
                    $this->db->bind(":driver_ntc", $driver_ntc);
                    $result = $this->db->Single();
                    return $result;
                }

                // --------------- save temporery password
                    // for owners
                    public function save_owner_temporery_password($data){
                        $this->db->query("UPDATE owner set password = :password where nic = :owner_nic");
                        $this->db->bind(":owner_nic",$data['owner_nic']);
                        $this->db->bind(":password",$data['password']);
                
                        return $this->db->execute();
                    }
                    
                    // for conductors
                    public function save_conductor_temporery_password($data){
                        $this->db->query('UPDATE conductor set password = :password where ntcNo = :conductor_ntc');
                        $this->db->bind(":password",$data['password']);
                        $this->db->bind(":conductor_ntc",$data['conductor_ntc']);
                    }

                    // for drivers

                    public function save_driver_temporery_password($data){
                        $this->db->query('UPDATE driver set password = :password where ntcNo = :driver_ntc');
                        $this->db->bind(":password",$data['password']);
                        $this->db->bind(":driver_ntc",$data['driver_ntc']);
                    }

    // insert_into_user table
                public function insert_into_user($data){
                    $this->db->query("INSERT INTO user (id, fname ,lname , email, password_hash, type) VALUES (:id ,:fname ,:lname ,:email ,:password_hash ,:type)");
                    $this->db->bind(":id",$data['id']);
                    $this->db->bind(":fname",$data['fname']);
                    $this->db->bind(":lname",$data['lname']);
                    $this->db->bind(":email",$data['email']);
                    $this->db->bind(":password_hash",$data['password_hash']);
                    $this->db->bind(":type",$data['type']);

                    return $this->db->execute();
                }

                
//---------------------Reject requests -----------

    public function delete_bus_requests($bus_no) {
        $this->db->query("DELETE from bus  WHERE bus_no= :bus_no");
        $this->db->bind(":bus_no", $bus_no);

        return $this->db->execute();
    }

    public function delete_owner_requests($owner_nic) {
        $this->db->query("DELETE FROM owner WHERE owner_nic= :owner_nic");
        $this->db->bind(":owner_nic", $owner_nic);

        return $this->db->execute();
    }

    public function delete_conductor_requests($conductor_ntc) {
        $this->db->query("DELETE FROM conductor WHERE conductor_ntc= :conductor_ntc");
        $this->db->bind(":conductor_ntc", $conductor_ntc);

        return $this->db->execute();
    }

    public function delete_drivevr_requests($driver_ntc) {
        $this->db->query("DELETE FROM driver WHERE driver_ntc= :driver_ntc");
        $this->db->bind(":driver_ntc", $driver_ntc);

        return $this->db->execute();
    }


    //  Download the permit image
    public function downloadPermitImage($bus_no){
        $this->db->query("SELECT permit_image FROM bus WHERE bus_no = :bus_no");
        $this->db->bind(':bus_no', $bus_no);

        return $this->db->single();
    
    }
    public function noOfRows($bus_no){
        $this->db->query("SELECT count(*) FROM bus WHERE bus_no = :bus_no");
        $this->db->bind(':bus_no', $bus_no);
    
        return $this->db->single();
       
    }
    
        

}

?>