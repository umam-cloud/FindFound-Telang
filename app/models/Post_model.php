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

    public function getPostByJenis($jenis){
        $this->db->query('SELECT *
        FROM postingan
        WHERE jenis_laporan = :jenis');

        $this->db->bind('jenis', $jenis);

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

    public function getPostByKodePost($kode){
        $this->db->query('SELECT postingan.*, kategori.nama_kategori, users.whatsapp
        FROM postingan 
        INNER JOIN kategori
        ON postingan.kategori_id = kategori.id
        INNER JOIN users
        ON postingan.user_id = users.id
        WHERE postingan.kode_postingan = :kode');

        $this->db->bind('kode', $kode);

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

    public function updateStatus($kode){
        $query = "UPDATE postingan SET status = 'selesai' WHERE kode_postingan = :kode";
        $this->db->query($query);
        $this->db->bind('kode', $kode);
        $this->db->execute();
    }

     public function getAllPostWithUser() {
        $this->db->query('SELECT postingan.*, users.nama FROM postingan 
                          INNER JOIN users ON postingan.user_id = users.id 
                          ORDER BY postingan.created_at DESC');
        return $this->db->resultset();
    }
        
    public function deletePost($id) {
        // Ambil nama file gambar terlebih dahulu untuk dihapus dari server
        $this->db->query('SELECT file_path FROM postingan WHERE id = :id');
        $this->db->bind('id', $id);
        $post = $this->db->resultsingel();
        if(!empty($post['file_path']) && file_exists('../public/img/postingan/' . $post['file_path'])) {
            unlink('../public/img/postingan/' . $post['file_path']);
        }
    
        $this->db->query('DELETE FROM postingan WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getAllAduan() {
        $this->db->query('SELECT lp.*, p.judul, p.file_path, p.kode_postingan, u.nama as nama_pelapor 
                          FROM laporan_postingan lp 
                          INNER JOIN postingan p ON lp.postingan_id = p.id 
                          INNER JOIN users u ON lp.pelapor_id = u.id');
        return $this->db->resultset();
    }
    
    public function totalAduan() {
        $this->db->query('SELECT COUNT(*) as total FROM laporan_postingan');
        $res = $this->db->resultsingel();
        return $res['total'] ?? 0;
    }

    public function getReportedPosts() {
        $this->db->query('SELECT lp.*, p.judul, p.file_path, u.nama as nama_pelapor 
                          FROM laporan_postingan lp
                          INNER JOIN postingan p ON lp.postingan_id = p.id
                          INNER JOIN users u ON lp.pelapor_id = u.id
                          ORDER BY lp.created_at DESC');
        
        return $this->db->resultset();
    }
    
    public function deleteLaporanPostingan($id_laporan) {
        $this->db->query('DELETE FROM laporan_postingan WHERE id = :id');
        $this->db->bind('id', $id_laporan);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahLaporanMasalah($data) {
        $this->db->query('INSERT INTO laporan_postingan (postingan_id, pelapor_id, alasan) 
                          VALUES (:postingan_id, :pelapor_id, :alasan)');
        
        $this->db->bind('postingan_id', $data['postingan_id']);
        $this->db->bind('pelapor_id', $data['pelapor_id']);
        $this->db->bind('alasan', $data['alasan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAduanById($id_laporan) {
        $this->db->query('SELECT lp.*, 
                          p.judul, p.deskripsi, p.file_path, p.jenis_laporan, p.lokasi_spesifik, p.created_at as tgl_post, p.status, p.kode_postingan,
                          up.nama as nama_pemosting, up.email as email_pemosting, up.whatsapp as wa_pemosting,
                          ur.nama as nama_pelapor
                          FROM laporan_postingan lp
                          INNER JOIN postingan p ON lp.postingan_id = p.id
                          INNER JOIN users up ON p.user_id = up.id
                          INNER JOIN users ur ON lp.pelapor_id = ur.id
                          WHERE lp.id = :id');
        
        $this->db->bind('id', $id_laporan);
        return $this->db->resultsingel();
    }
}

