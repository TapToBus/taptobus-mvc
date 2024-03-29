<?php

class M_owner_leaverequests{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function view_leaverequests(){
        // prepare query
        
        $this->db->query('SELECT * from leave_request WHERE owner_nic= :nic AND status="pending"');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function view_leaverequests2(){
        // prepare query
        
        $this->db->query('SELECT * from leave_request WHERE owner_nic= :nic AND (status="accept" OR status="reject")');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function request_details($request_id){
        // prepare query

        $this->db->query('SELECT * from leave_request WHERE request_id= :request_id');
        $this->db->bind(':request_id',$request_id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function update_assigned_bus($user_ntc,$type){
        // prepare query

        $table_name =$type;
        $this->db->query("SELECT * from $table_name WHERE ntcNo = :user_ntc");//aluth db ekee nama wenas ntc kiyna eka
        $this->db->bind(':user_ntc',$user_ntc);
        $results = $this->db->single();
        $old_bus_no = $results->bus_no ;

        $this->db->query("UPDATE $table_name SET bus_no = NULL WHERE ntcNo= :user_ntc");
        $this->db->bind(':user_ntc',$user_ntc);
        $this->db->execute();  

        if($type=='conductor'){ 

        $this->db->query("UPDATE bus SET con_ntc = NULL WHERE bus_no= :bus_no");
        $this->db->bind(':bus_no',$old_bus_no);
        $this->db->execute();

        }

        if($type=='driver'){

            $this->db->query("UPDATE bus SET dri_ntc = NULL WHERE bus_no= :bus_no");
            $this->db->bind(':bus_no',$old_bus_no);
            $this->db->execute();
    
        }

        return $results;

    }

    public function remove_leaverequest($request_id){

        // prepare query
        $this->db->query("UPDATE leave_request SET status='accept' WHERE request_id = :request_id");
        $this->db->bind(':request_id',$request_id);
        $this->db->execute();

    }

    public function reject_leaverequest($request_id){

        // prepare query
        $this->db->query("UPDATE leave_request SET status='reject' WHERE request_id = :request_id");
        $this->db->bind(':request_id',$request_id);
        $this->db->execute();

    }

   
}

?>