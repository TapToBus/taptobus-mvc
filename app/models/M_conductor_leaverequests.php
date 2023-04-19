<?php

class M_conductor_leaverequests
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function add_leaverequests($data)
    {

        $type = 'conductor';

        // prepare query 
        $this->db->query('INSERT INTO leaverequest (user_ntc,bus_no,date,amount) VALUES (:user_ntc,:bus_no,:date,:amount)');

        $this->db->bind(':date_from', $data['date_from']);
        $this->db->bind(':date_to', $data['date_to']);
        $this->db->bind(':reason', $data['reason']);

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
        $this->db->query('SELECT * from conductor WHERE nic= :nic');

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
