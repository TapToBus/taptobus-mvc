<?php
class M_admin_remove_bus_owner {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getremoveowner(){
        $this->db->query("SELECT * FROM owner WHERE status = 'pending'");
        return $this->db->resultSet();
    }

    // public function get_remove_bus_owner($data){
    //     $this->db->query("UPDATE bus_owner SET status = :status WHERE id = :id");
    //     $this->db->bind(":status",$data['status']);
    //     $this->db->bind(":id",$data['id']);
    //     return $this->db->execute();
    // }

    public function remove_bus_owner($nic){
        $this->db->query("UPDATE owner SET status = 'active' WHERE nic = :nic");
        $this->db->bind(":nic", $nic);
        return $this->db->execute();
    }

}
?>


