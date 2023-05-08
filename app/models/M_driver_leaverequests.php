<?php

class M_driver_leaverequests
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function add_leaverequests($data,$new)
    {
        
        $type = 'driver';

        // prepare query 
        $this->db->query('INSERT INTO leave_request (user_ntc,user_fname,user_lname,type,reason,date_from,date_to,owner_nic,bus_no) VALUES (:user_ntc,:user_fname,:user_lname,:type,:reason,:date_from,:date_to,:owner_nic,:bus_no)');

        $this->db->bind(':date_from', $data['date_from']);
        $this->db->bind(':date_to', $data['date_to']);
        $this->db->bind(':reason', $data['reason']);
        $this->db->bind(':user_ntc', $new->ntcNo);
        $this->db->bind(':user_fname', $new->fname);
        $this->db->bind(':user_lname', $new->lname);
        $this->db->bind(':type', $type);
        $this->db->bind(':owner_nic', $new->owner_nic);
        $this->db->bind(':bus_no',$new->bus_no);
        

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_details()
    {

        $id = $_SESSION['user_id'];

        // prepare query
        $this->db->query('SELECT * from driver WHERE ntcNo= :nic');

        $this->db->bind(':nic', $id);
        $result = $this->db->single();
        return $result;
    }

    public function view_leaverequests($user_ntc)
    {
        // prepare query
        $this->db->query('SELECT * from leave_request WHERE user_ntc= :user_ntc');

        $this->db->bind(':user_ntc', $user_ntc);
        $results = $this->db->resultSet();
        return $results;
       
    }

}
