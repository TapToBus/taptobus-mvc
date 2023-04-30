<?php
class M_Staff {
    private $db;

    public function __construct()
    {
        $this->db = new Database();   // create an instance of Database 
    }


    //------------------ Notice part-----------------------

    public function addNotices($data){
        $this->db->query("INSERT INTO special_notices (staff_no, title, description, date_from, date_to) VALUES (:staff_no, :title, :description, :date_from, :date_to)");
        $this->db->bind(":staff_no", $data["staff_no"]);
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":date_from", $data["date_from"]);
        $this->db->bind(":date_to", $data["date_to"]);

        return $this->db->execute();  
            
    }

    public function getlastNoticeId() {
        $this->db->query("SELECT LAST_INSERT_ID() as lastId;");
        return $this->db->single();
    }

    public function addAvailableUser($user, $notice_id){        
            
        $this->db->query("INSERT INTO notice_available_users(notice_id, user) VALUES (:notice_id, :user)");
        $this->db->bind(":user", $user);
        $this->db->bind(":notice_id", $notice_id);
        return $this->db->execute();
        
    }
    public function viewAvailableUsers($notice_id){
        $this->db->query("SELECT * FROM notice_available_users where notice_id = :notice_id");
        $this->db->bind(":notice_id", $notice_id);
        return $this->db->resultSet();
    }


    public function viewNotices($id){

        //  limit $start_from,$num_per_page
        // $this->db->query("SELECT * FROM special_notices INNER JOIN staffmember ON special_notices.staff_no = staffmember.staff_no WHERE special_notices.staff_no = :staff_no order by time_stamp desc");
        $this->db->query("SELECT sn.title, sn.description, sn.date_from, sn.date_to, sn.time_stamp,sn.staff_no,sn.notice_id,sm.first_name,sm.last_name FROM special_notices as sn inner join staffmember as sm ON sn.staff_no = sm.staff_no  order by sn.time_stamp desc");
        // $this->db->bind(":staff_no", $id);
        $result = $this->db->resultSet();
     
        return $result;
    } 








    


    //-------------- retrieve  all users details from the relavent tables ---------------

    public function viewOwners(){
        $this->db->query("SELECT nic, fname, lname, email, mobileNo FROM owner where status = 'active' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function viewDrivers(){
        $this->db->query("SELECT ntcNo, nic, fname, lname, email, mobileNo FROM driver where status = 'active' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function viewConductors(){
        $this->db->query("SELECT ntcNo, nic, fname, lname, email, mobileNo FROM conductor where status = 'active' ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function viewBuses(){
        $this->db->query("SELECT bus_no, root_no, capacity, owner_nic FROM bus where status = 'active' ");
        $result = $this->db->resultSet();
        return $result;
    }

    // edit the notice
    // public function editNotice($data){
    //     $this->db->query("UPDATE  special_notices set title = :title , description = :description where notice_id = :notice_id");
    //     $this->db->bind(":notice_id", $data['notice_id']);
    //     $this->db->bind(":title", $data["edit_title"]);
    //     $this->db->bind(":description", $data["edit_description"]);

    //     return $this->db->execute();    

    // }

}
?>