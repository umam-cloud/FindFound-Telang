<?php

class Laporan extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('laporan/laporan');
        $this->view('templates/footer');
    }

    public function addLaporan(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: '.BASEURL.'/laporan/');
            return;
        }
    
        $post_model = $this->model('Post_model');

        $lastCode = $post_model->getLastKode(); 
        echo $lastCode;
        $urutan = (int) substr($lastCode, 5);   
        $urutan++;                              
        $kodeOtomatis = "PST" . sprintf("%03d", $urutan);
    
        $data = $_POST;
        $data['id_user'] = $_SESSION['id_user'];
        $data['kode_postingan'] = $kodeOtomatis; 
    
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
                }
            } else {
                $_SESSION['err'] = 'Ukuran File Gambar Lebih dari 10MB atau ekstensi salah';
            }
        }
    
        $post_model->addPost($data);
        header('location: '.BASEURL.'/laporan/');
        exit;
    }
}