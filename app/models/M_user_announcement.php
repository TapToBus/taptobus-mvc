<?php
class M_user_announcement{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNoticeIdsByUserRole($role){
        $this->db->query("SELECT notice_id from notice_available_users where user = :role");
        $this->db->bind(':role', strtolower($role));
        return $this->db->resultSet();
    }

    public function viewAnnouncementById($notice_id){
        // "SELECT sn.title, sn.description, sn.date_from, sn.date_to, sn.time_stamp,sn.staff_no,sn.notice_id,sm.first_name,sm.last_name FROM special_notices as sn inner join staffmember as sm ON sn.staff_no = sm.staff_no where sn.notice_id = :notice_id order by sn.time_stamp desc"
        $this->db->query("SELECT * from special_notices where notice_id = :notice_id order by time_stamp desc");
        $this->db->bind(':notice_id', $notice_id);
        return $this->db->single();
    }

    public function deleteAnnouncementById($notice_id){
        $this->db->query("DELETE FROM special_notices WHERE notice_id = :notice_id");
        $this->db->bind(':notice_id', $notice_id);
        return $this->db->execute();
    }

}
?>