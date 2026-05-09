<?php

class User_model{
    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;

    }

    public function tambahData($data) {
        $query = "INSERT INTO " . $this->table . " (nama, email, whatsapp, password) 
                  VALUES(:nama, :email, :whatsapp, :password)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('whatsapp', $data['whatsapp']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateData($data) {
        $query = "UPDATE " . $this->table . " 
                  SET nama = :nama, 
                      email = :email, 
                      whatsapp = :whatsapp,
                      lokasi_pilihan = :lokasi,
                      foto_profil = :profile
                  WHERE id = :id";

        $this->db->query($query);
        
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('whatsapp', $data['whatsapp']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('profile', $data['foto_profil']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserByEmail($email){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->resultsingel();
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultsingel();
    }
}