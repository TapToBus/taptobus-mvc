<?php

class M_Admin_report{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function get_income_records(){

        $this->db->query('SELECT * FROM incomerecords');

        return $this->db->resultSet();
        
    }
}

// class M_Admin_report{
//     private $db;

//     public function __construct(){
//         $this->db = new Database();
//     }

//     public function get_Date_From_Date_To_Report($data){

//         //search fro given value and get the data form database
        


//     }
    
// }
?>