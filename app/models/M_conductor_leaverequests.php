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

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO leaverequest (user_ntc,bus_no,date,amount) VALUES (:user_ntc,:bus_no,:date,:amount)');

        $this->db->bind(':user_ntc', $id);
        $this->db->bind(':bus_no', $data['bus_no']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':amount', $data['amount']);

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
        $this->db->query('SELECT bus_no from conductor WHERE nic= :nic');

        $this->db->bind(':nic', $id);
        $result = $this->db->single();
        return $result;
    }

    public function view_leaverequests($user_ntc)
    {


        // prepare query
        $this->db->query('SELECT date,amount from incomerecords WHERE bus_no= :bus_no');

        $this->db->bind(':bus_no', $bus_no);
        $results = $this->db->resultSet();
        return $results;
    }

}
