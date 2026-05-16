<?php

class Post_model{
    private $table = 'postingan';
    private $db;

    public function __construct(){
        $this->db = new Database;

    }

    public function getLastKode() {
        $this->db->query("SELECT max(kode_postingan) as kodeTerbesar FROM " . $this->table);
        $result = $this->db->resultsingel();
        return $result['kodeTerbesar'];
    }


    public function getNewPost($keyword){
        $filter = ' WHERE 1=1';
        if(!is_null($keyword)){
            $filter .= " AND judul LIKE :keyword";
        }

        $query ='SELECT *
                FROM postingan'
                .$filter.
                ' ORDER BY postingan.created_at DESC
                LIMIT 6';
              
        $this->db->query($query);

        if(!is_null($keyword)){
            $this->db->bind('keyword', "%$keyword%");
        }

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
        (user_id, kategori_id, kode_postingan, jenis_laporan, judul, deskripsi, tanggal_kejadian, lokasi_spesifik, file_path)
        VALUES (:user, :kategori, :kode, :jenis, :judul, :deskripsi , :tanggal, :lokasi, :gambar)');

        $this->db->bind('user', $data['id_user']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('kode', $data['kode_postingan']); 
        $this->db->bind('jenis', $data['jenis_laporan']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('gambar', $data['foto_postingan']);

        return $this->db->execute();
    }

    public function updatePost($data){
        $this->db->query('UPDATE postingan 
        SET kategori_id = :kategori, judul = :judul, deskripsi = :deskripsi, tanggal_kejadian = :tanggal, lokasi_spesifik = :lokasi, file_path = :gambar
        WHERE id = :id');

        $this->db->bind('id', $data['id_postingan']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('gambar', $data['foto_postingan']);

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
        WHERE user_id = :id
        ORDER BY postingan.created_at DESC');

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

    public function getPostPagination($filters ,$offset, $limit, $urutan, $keyword) {
        $filterKondisi = "WHERE 1=1"; 
        if(!empty($filters['kategori'])) {
            $kategoris = "'" . implode("','", $filters['kategori']) . "'";
            $filterKondisi .= " AND kategori_id IN ($kategoris)";
        }

        if($filters['status'] !== 'semua') {
            $filterKondisi .= " AND jenis_laporan = :status";
        }

        if($filters['waktu'] !== 'all') {
            $hari = (int)$filters['waktu'];
            $filterKondisi .= " AND created_at >= DATE_SUB(NOW(), INTERVAL $hari DAY)";
        }

        if(!is_null($keyword)){
            $filterKondisi .= " AND judul LIKE :keyword";
        }

        $query = "SELECT COUNT(*) as total FROM postingan ". $filterKondisi;
        $this->db->query($query);

        if($filters['status'] !== 'semua') {
            $this->db->bind('status', $filters['status']);
        }

        if(!is_null($keyword)){
            $this->db->bind('keyword', "%$keyword%");
        }
        
        $result = $this->db->resultsingel(); 
        $totalData = $result['total'] ?? 0;

        $query = "SELECT * FROM postingan ".$filterKondisi." ORDER BY created_at $urutan LIMIT :offset, :limit";
        $this->db->query($query);

        if($filters['status'] !== 'semua') {
            $this->db->bind('status', $filters['status']);
        }

        if(!is_null($keyword)){
            $this->db->bind('keyword', "%$keyword%");
        }
        
        $this->db->bind('offset', $offset);
        $this->db->bind('limit', $limit);

        $postingan = $this->db->resultset();

        return [
            'data' => $postingan,
            'jumlahData' => $totalData
            ];
    }

    public function updateStatus($id){
        $query = "UPDATE postingan SET status = 'selesai' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function deletePost($id){
        $this->db->query('DELETE FROM postingan WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
    }
}