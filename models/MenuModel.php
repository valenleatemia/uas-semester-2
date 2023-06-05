<?php

class MenuModel {

    private $table = "menu";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllMenu() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahMenu($data){
        $this->db->query("INSERT INTO menu (nama_menu) VALUES(:nama_menu)");
        $this->db->bind('nama_menu',$data['nama_menu']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMenuById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateDataMenu($data){
        $this->db->query("UPDATE menu SET nama_menu=:nama_menu WHERE id=:id");
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_menu',$data['nama_menu']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMenu(){
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_menu LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function deleteMenu($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
