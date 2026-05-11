<?php

class Laporan extends Controller{
    public function index(){
        // var_dump($_POST);
        // var_dump($_FILES);
        $this->view('templates/header');
        $this->view('laporan/laporan');
        $this->view('templates/footer');
    }

    public function addLaporan(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('laporan/');
            return;
        }

        $data = $_POST;
        $data['id_user'] = $_SESSION['id_user'];

        if (isset($_FILES['foto_laporan']) && $_FILES['foto_laporan']['error'] === 0) {
            
            $namaFile = $_FILES['foto_laporan']['name'];
            $ukuranFile = $_FILES['foto_laporan']['size'];
            $tmpName = $_FILES['foto_laporan']['tmp_name'];

            $ekstensiValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

            if (in_array($ekstensiGambar, $ekstensiValid) && $ukuranFile < 2000000) {
                $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                $tujuan = '../public/img/postingan/' . $namaFileBaru;
                
                if (move_uploaded_file($tmpName, $tujuan)) {
                    $data['foto_laporan'] = $namaFileBaru;
                }
            } else {
                $_SESSION['err'] = 'Ukuran File Gambar Lebih dari 10MB';
            }
        }

        $post_model = $this->model('Post_model');
        $post_model->addPost($data);

        header('location: '.BASEURL.'/laporan/');
    }
}