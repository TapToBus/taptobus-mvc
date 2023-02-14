<?php
class M_Staff {
    private $db;

    public function __construct()
    {
        $this->db = new Database();   // create an instance of Database 
    }


    public function addNotices($data){
        $this->db->query("INSERT INTO special_notices (staff_no, title, description, date_from, date_to) VALUES (:staff_no, :title, :description, :date_from, :date_to)");
        $this->db->bind(":staff_no", $data["staff_no"]);
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":date_from", $data["date_from"]);
        $this->db->bind(":date_to", $data["date_to"]);

        // if($this->db->execute()){  // error handling part 
        //     return true;
        // }else{
        //     return false;
        // }

        // uda eka wenuwata meka dann puluwan

        return $this->db->execute();    // check whether  the exucuted is successful or not

    }


    public function viewNotices($id){

        //  limit $start_from,$num_per_page
        $this->db->query("SELECT * FROM special_notices INNER JOIN staffmember ON special_notices.staff_no = staffmember.staff_no WHERE special_notices.staff_no = :staff_no order by time_stamp desc");
        $this->db->bind(":staff_no", $id);
        $result = $this->db->resultSet();

        return $result;
    } 

}