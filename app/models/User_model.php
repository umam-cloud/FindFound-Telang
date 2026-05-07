<?php

class User_model{
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;

    }

    public function tambahData($data) {
        $query = "INSERT INTO " . $this->table . " (nama_lengkap, email, no_telp, password) 
                  VALUES(:nama, :email, :whatsapp, :password)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('whatsapp', $data['whatsapp']);
        // Menggunakan password_hash untuk keamanan standar industri
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->resultsingel();
    }
    
}