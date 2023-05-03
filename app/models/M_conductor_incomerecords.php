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
        $this->db->query('SELECT date, amount
        FROM incomerecords
        WHERE date >= DATE(NOW()) - INTERVAL 7 DAY AND bus_no=:bus_no ORDER BY date ASC');

        $this->db->bind(':bus_no', $bus_no);
        $results = $this->db->resultSet();

        $xValues = array();
        $yValues = array();

        foreach ($results as $row) {

            $xValues[] = $row->date;
            $yValues[] = $row->amount;
        }

        return array(

            'xValues' => $xValues,
            'yValues' => $yValues
        );
    }

    public function view_incomerecords_forbusses()
    {

        $id = $_SESSION['user_id'];
        // prepare query
        $this->db->query('SELECT ir.date, ir.bus_no, COALESCE(SUM(b.price), 0) + ir.amount AS amount
        FROM incomerecords ir
        LEFT JOIN bookings b ON b.bus_no = ir.bus_no AND DATE_FORMAT(b.booked_datetime,"%Y-%m-%d") = ir.date
        WHERE ir.date BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()
          AND ir.bus_no IN (SELECT bus_no FROM bus WHERE owner_nic = :owner_nic)
        GROUP BY ir.date, ir.bus_no');

        $this->db->bind(':owner_nic', $id);
        $results = $this->db->resultSet();

        $data = array();
        foreach ($results as $row) {
            $date = $row->date;
            $bus_no = $row->bus_no;
            $amount = $row->amount;
            $data[$bus_no][$date] = $amount;
        }
        

        return $data;
    }

    public function delete_incomerecords($record_id)
    {

        // prepare query
        $this->db->query('DELETE from incomerecords WHERE record_id= :record_id');
        $this->db->bind(':record_id', $record_id);
        $this->db->execute();
    }
}
