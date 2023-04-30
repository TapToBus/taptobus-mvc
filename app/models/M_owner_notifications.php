<?php

class M_owner_notifications{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function create_assign_con_notification($owner_nic,$heading,$description){

        $this->db->query('INSERT INTO owner_notifications(nic,heading,description) VALUES (:owner_nic,:heading,:description)');

        $this->db->bind(':owner_nic', $owner_nic);
        $this->db->bind(':heading', $heading);
        $this->db->bind(':description', $description);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function view_notifications(){

        $this->db->query("SELECT * FROM owner_notifications WHERE nic = :owner_nic AND read_status=1");
        $owner_nic = $_SESSION['user_id'];
        $this->db->bind(':owner_nic', $owner_nic);
        $results = $this->db->resultSet();
        return $results;
    }

    // public function not_status_change(){

    //     $this->db->query("UPDATE owner_notifications SET read_status=1 WHERE nic = :owner_nic");
    //     $owner_nic = $_SESSION['user_id'];
    //     $this->db->bind(':owner_nic', $owner_nic);
    //     $this->db->execute();

    // }

  }

?>