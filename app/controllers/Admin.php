<?php

class Admin extends Controller {
    public function __construct() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    // 1. Panel Dashboard Utama
    public function index() {
        $data['judul'] = 'Admin Dashboard';
        $user_model = $this->model('User_model');
        $post_model = $this->model('Post_model');

        $data['total_pengguna'] = $user_model->totalUser();
        $data['post_temuan'] = $post_model->getPostByJenis('temuan');
        $data['post_hilang'] = $post_model->getPostByJenis('hilang');
        $data['total_aduan'] = $post_model->totalAduan();

        $data['kasus_selesai'] = $post_model->getTotalPostByStatus('selesai');
        $data['status_aktif'] = $post_model->getTotalPostByStatus('aktif');
        $data['recent_activities'] = $post_model->getRecentActivities(3);

        $this->view('admin/templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('admin/templates/footer');
    }

    // 2. Panel Daftar Postingan
    public function postingan() {
        $data['judul'] = 'Daftar Postingan';
        
        // Mengambil semua data postingan secara menyeluruh untuk dipantau
        $data['postingan'] = $this->model('Post_model')->getAllPostWithUser();
    
        $this->view('admin/templates/header', $data);
        $this->view('admin/postingan', $data);
        $this->view('admin/templates/footer');
    }
    
    // Aksi 1: Jika admin memutuskan untuk menghapus Postingan yang dilaporkan
    public function hapusPostingan($id_post) {
        $post_model = $this->model('Post_model');
        
        // Panggil fungsi deletePost yang ada di model
        if ($post_model->deletePost($id_post) > 0) {
            // Berhasil dihapus, kembalikan ke halaman aduan
            header('Location: ' . BASEURL . '/admin/aduan');
            exit;
        } else {
            // Jika gagal, tetap kembalikan
            header('Location: ' . BASEURL . '/admin/aduan');
            exit;
        }
    }

    // 2. Fungsi untuk tombol "Abaikan" (Menghapus aduan dari tabel laporan_postingan)
    public function abaikanLaporan($id_laporan) {
        $post_model = $this->model('Post_model');
        
        $post_model->deleteLaporanPostingan($id_laporan);
        
        header('Location: ' . BASEURL . '/admin/aduan');
        exit;
    }

    // 3. Panel Kelola Pengguna
    public function pengguna() {
        $data['judul'] = 'Kelola Pengguna';
        $data['users'] = $this->model('User_model')->getAllUser();

        $this->view('admin/templates/header', $data);
        $this->view('admin/pengguna', $data);
        $this->view('admin/templates/footer');
    }

    // Action: Hapus Pengguna
    public function hapusPengguna($id) {
        if ($this->model('User_model')->deleteUser($id) > 0) {
            header('Location: ' . BASEURL . '/admin/pengguna');
            exit;
        }
    }

    // 4. Panel Aduan Laporan Masalah
    public function aduan() {
        $data['judul'] = 'Aduan Postingan';
        $data['aduan'] = $this->model('Post_model')->getAllAduan();

        $this->view('admin/templates/header', $data);
        $this->view('admin/aduan', $data);
        $this->view('admin/templates/footer');
    }

    public function detailAduan($id_laporan) {
        $data['judul'] = 'Detail Laporan';
        $data['aduan'] = $this->model('Post_model')->getAduanById($id_laporan);

        // Jika data tidak ditemukan, kembalikan ke tabel
        if (!$data['aduan']) {
            header('Location: ' . BASEURL . '/admin/aduan');
            exit;
        }

        $this->view('admin/templates/header', $data);
        $this->view('admin/detail_aduan', $data);
        $this->view('admin/templates/footer');
    }
}