<?php

class M_owner_buses{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function add_bus($data){

        $id = $_SESSION['user_id'];
        $status = "pending";
        // prepare query
        $this->db->query('INSERT INTO bus (bus_no,root_no,capacity,bus_image,permit_image,wifi,usb,tv,status,owner_nic) VALUES (:bus_no, :root_no,:capacity, :bus_image,:permit_image,:wifi,:usb,:tv,:status,:nic)');

        // bind values
        $id = $_SESSION['user_id'];
        $this->db->bind(':bus_no', $data['bus_no']);
        $this->db->bind(':root_no', $data['root_no']);
        // $this->db->bind(':owner_name', $data['owner_name']);
        $this->db->bind(':capacity', $data['capacity']);
        $this->db->bind(':bus_image', $data['bus_image']);
        $this->db->bind(':permit_image', $data['permit_image']);
        $this->db->bind(':wifi', $data['wifi']);
        $this->db->bind(':usb', $data['usb']); 
        $this->db->bind(':tv', $data['tv']);
        $this->db->bind(':status', $status);
        $this->db->bind(':nic', $id); 

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function view_buses(){
        // prepare query
        $this->db->query('SELECT * from bus WHERE owner_nic= :nic');
        $id = $_SESSION['user_id'];
        $this->db->bind(':nic',$id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function bus_details($bus_no){
        // prepare query
        $this->db->query('SELECT * from bus WHERE bus_no= :bus_no');
        $this->db->bind(':bus_no',$bus_no);
        $results = $this->db->single();
        return $results;

    }

    public function change_conductor($con,$bus_no){
        // prepare query
        $this->db->query('UPDATE bus SET con_ntc=:con  WHERE bus_no= :bus_no');
        $this->db->bind(':con',$con);
        $this->db->bind(':bus_no',$bus_no);
        $this->db->execute();

        $this->db->query('UPDATE conductor SET bus_no=:bus_no  WHERE ntcNo= :con');
        $this->db->bind(':con',$con);
        $this->db->bind(':bus_no',$bus_no);
        $this->db->execute(); 

    }

    public function change_driver($dri,$bus_no){
        // prepare query
        $this->db->query('UPDATE bus SET dri_ntc=:dri  WHERE bus_no= :bus_no');
        $this->db->bind(':dri',$dri);
        $this->db->bind(':bus_no',$bus_no);
        $this->db->execute();

        $this->db->query('UPDATE conductor SET bus_no=:bus_no  WHERE ntcNo= :dri');
        $this->db->bind(':dri',$dri);
        $this->db->bind(':bus_no',$bus_no);
        $this->db->execute();

    }
    
    public function findOwnerByBusNo($bus_no){
        // prepare query
        $this->db->query('SELECT * FROM bus WHERE bus_no = :bus_no');

        // bind value
        $this->db->bind(':bus_no', $bus_no);

        $row = $this->db->single();

        // check row is exist or not
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
      

    }

}

?>