<?php

class Post_model{
    private $table = 'postingan';
    private $db;

    public function __construct(){
        $this->db = new Database;

    }

    public function getNewPost(){
        $this->db->query('SELECT *
            FROM postingan
            ORDER BY postingan.created_at DESC
            LIMIT 6');

        return $this->db->resultset();
    }
    
    public function getAllPost(){
        $this->db->query('SELECT *
            FROM postingan
            ORDER BY postingan.created_at DESC');

        return $this->db->resultset();
    }

    public function getKategori(){
        $this->db->query('SELECT * FROM kategori');
        return $this->db->resultset();
    }

    public function addPost($data){
        $this->db->query('INSERT INTO postingan 
        (user_id, kategori_id, jenis_laporan, judul, deskripsi, tanggal_kejadian, lokasi_spesifik, file_path)
        VALUE (:user, :kategori, :jenis, :judul, :deskripsi , :tanggal, :lokasi, :gambar)');

        $this->db->bind('user', $data['id_user']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('jenis', $data['jenis_laporan']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('gambar', $data['foto_laporan']);

        $this->db->execute();
    }

    public function getStatusPostById($id, $status){
        $this->db->query('SELECT *
        FROM postingan
        WHERE status = :status AND user_id = :id');

        $this->db->bind('id', $id);
        $this->db->bind('status', $status);

        $this->db->resultset();
        return $this->db->rowcount();
    }

    public function getPostByIdUser($id){
        $this->db->query('SELECT postingan.*
        FROM postingan
        WHERE user_id = :id');

        $this->db->bind('id', $id);

        return $this->db->resultset();
    }

    public function getPostByIdPost($id){
        $this->db->query('SELECT postingan.*, kategori.nama_kategori, users.whatsapp
        FROM postingan 
        INNER JOIN kategori
        ON postingan.kategori_id = kategori.id
        INNER JOIN users
        ON postingan.user_id = users.id
        WHERE postingan.id = :id');

        $this->db->bind('id', $id);

        return $this->db->resultsingel();
    }

    public function getRowAllPost(){
        $this->db->query('SELECT *
            FROM postingan');

        $this->db->resultset();

        return $this->db->rowcount();
    }

    public function updateStatus($id){
        $query = "UPDATE postingan SET status = 'selesai' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
    }
}