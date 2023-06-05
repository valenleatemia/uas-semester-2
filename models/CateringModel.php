<?php

class CateringModel {

    private $table = "catering";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCatering() {
        $this->db->query("SELECT catering.*, 
            menu1.nama_menu AS menu1_name, 
            menu2.nama_menu AS menu2_name, 
            menu3.nama_menu AS menu3_name, 
            menu4.nama_menu AS menu4_name, 
            menu5.nama_menu AS menu5_name 
            FROM " . $this->table . " 
            JOIN menu AS menu1 ON menu1.nama_menu = catering.menu1  
            JOIN menu AS menu2 ON menu2.nama_menu = catering.menu2  
            JOIN menu AS menu3 ON menu3.nama_menu = catering.menu3  
            JOIN menu AS menu4 ON menu4.nama_menu = catering.menu4  
            JOIN menu AS menu5 ON menu5.nama_menu = catering.menu5");
        return $this->db->resultSet();
    }
    

    public function tambahCatering($data) {
        $this->db->query("INSERT INTO catering (nama_pesanan, menu1, menu2, menu3, menu4, menu5, harga) 
            VALUES (:nama_pesanan, :menu1, :menu2, :menu3, :menu4, :menu5, :harga)");
        $this->db->bind('nama_pesanan', $data['nama_pesanan']);
        $this->db->bind('menu1', $data['menu1']);
        $this->db->bind('menu2', $data['menu2']);
        $this->db->bind('menu3', $data['menu3']);
        $this->db->bind('menu4', $data['menu4']);
        $this->db->bind('menu5', $data['menu5']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getCateringById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateDataCatering($data) {
        $this->db->query("UPDATE catering SET nama_pesanan=:nama_pesanan, menu1=:menu1, menu2=:menu2, menu3=:menu3, menu4=:menu4, menu5=:menu5, harga=:harga WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_pesanan', $data['nama_pesanan']);
        $this->db->bind('menu1', $data['menu1']);
        $this->db->bind('menu2', $data['menu2']);
        $this->db->bind('menu3', $data['menu3']);
        $this->db->bind('menu4', $data['menu4']);
        $this->db->bind('menu5', $data['menu5']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    

    public function cariCatering() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_pesanan LIKE :key 
                          OR menu1 LIKE :key 
                          OR menu2 LIKE :key 
                          OR menu3 LIKE :key 
                          OR menu4 LIKE :key 
                          OR menu5 LIKE :key 
                           OR harga LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    
    
    

    public function deleteCatering($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
