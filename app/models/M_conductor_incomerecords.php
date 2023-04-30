<?php

class M_conductor_incomerecords
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function add_incomerecords($data)
    {

        $id = $_SESSION['user_id'];
        // prepare query 
        $this->db->query('INSERT INTO incomerecords (user_ntc,bus_no,date,amount) VALUES (:user_ntc,:bus_no,:date,:amount)');

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

    public function find_bus()
    {

        $id = $_SESSION['user_id'];
        // prepare query
        $this->db->query('SELECT bus_no from conductor WHERE nic= :nic');


        $this->db->bind(':nic', $id);
        $result = $this->db->single();
        return $result;
       
    }

    public function view_incomerecords($bus_no)
    {


        // prepare query
        $this->db->query('SELECT record_id,date,amount from incomerecords WHERE bus_no= :bus_no');

        $this->db->bind(':bus_no', $bus_no);
        $results = $this->db->resultSet();
        return $results;
    }

    public function view_incomerecords_forbus($bus_no)
    {
        // prepare query
        $this->db->query('SELECT date,amount from incomerecords WHERE bus_no= :bus_no');

        $this->db->bind(':bus_no', $bus_no);
        $results = $this->db->resultSet();

        $xValues = array();
        $yValues = array();

        foreach($results as $row){

           $xValues[] = $row->date;
           $yValues[] = $row->amount;

        }
        
        return array(

            'xValues' => $xValues,
            'yValues' => $yValues
        );
    }

    public function delete_incomerecords($record_id)
    {

        // prepare query
        $this->db->query('DELETE from incomerecords WHERE record_id= :record_id');
        $this->db->bind(':record_id', $record_id);
        $this->db->execute();
    }
}
