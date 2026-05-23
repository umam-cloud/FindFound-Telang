<?php

class Laporan extends Controller{
    public function index(){
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  
        $this->view('templates/header');
        $this->view('laporan/laporan');
        $this->view('templates/footer');
    }

    public function addLaporan(){
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: '.BASEURL.'/laporan/');
            return;
        }
        
        $_SESSION['old_input'] = $_POST;
        
        $post_model = $this->model('Post_model');
    
        $data = $_POST;
        $data['id_user'] = $_SESSION['id_user'];

        $lastCode = $post_model->getLastKode(); 
        $urutan = (int) substr($lastCode, 5);   
        $urutan++;                              
        $kodeOtomatis = "PST" . sprintf("%03d", $urutan);

        $data['kode_postingan'] = $kodeOtomatis; 

        $kata_kasar = ['bangsat', 'anjing', 'kontol'];
        $input_fields = ['judul', 'lokasi', 'deskripsi'];

        foreach ($input_fields as $field) {
            if (!empty($_POST[$field])) {
                foreach ($kata_kasar as $kata) {
                    if (stripos($_POST[$field], $kata) !== false) {
                        $_SESSION['err'] = 'Peringatan: Terdapat kata kasar (tidak pantas) pada form ' . $field . '!'; 
                        header('location: '.BASEURL.'/laporan/');
                        exit;
                    }
                }
            }
        }

        if(!isset($_POST['jenis_laporan'])){
            $_SESSION['err'] = 'Jenis Laporan belum di tentukan'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }
    
        if(empty(trim($_POST['judul'] ?? ''))){
            $_SESSION['err'] = 'Form judul Wajib di isi!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }

        if(empty(trim($_POST['tanggal'] ?? ''))){
            $_SESSION['err'] = 'Form tanggal kejadian Wajib di isi!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }

        if(empty(trim($_POST['kategori'] ?? ''))){
            $_SESSION['err'] = 'Form kategori Wajib di isi!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }

        if(empty(trim($_POST['lokasi'] ?? ''))){
            $_SESSION['err'] = 'Form lokasi Wajib di isi!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }
        
        if(empty(trim($_POST['deskripsi'] ?? ''))){
            $_SESSION['err'] = 'Form deskripsi Wajib di isi!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }

        if (isset($_FILES['foto_postingan']) && $_FILES['foto_postingan']['error'] === 0) {
            $namaFile = $_FILES['foto_postingan']['name'];
            $ukuranFile = $_FILES['foto_postingan']['size'];
            $tmpName = $_FILES['foto_postingan']['tmp_name'];
    
            $ekstensiValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    
            
            if (in_array($ekstensiGambar, $ekstensiValid) && $ukuranFile < 10000000) {
                $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                $tujuan = '../public/img/postingan/' . $namaFileBaru;
                
                if (move_uploaded_file($tmpName, $tujuan)) {
                    $data['foto_postingan'] = $namaFileBaru;
                } else {
                    $_SESSION['err'] = 'Gagal memindahkan file gambar.';
                    header('location: '.BASEURL.'/laporan/');
                    exit;
                }
            } else {
                $_SESSION['err'] = 'Ukuran File Gambar Lebih dari 10MB atau ekstensi salah';
                header('location: '.BASEURL.'/laporan/');
                exit;
            }
        }else{
            $_SESSION['err'] = 'Bukti Gambar Barang belum dimasukkan!'; 
            header('location: '.BASEURL.'/laporan/');
            exit;
        }
    
        $post_model->addPost($data);
        unset($_SESSION['old_input']);
        header('location: '.BASEURL.'/laporan/');
        exit;

    }
}