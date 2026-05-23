<?php

class Aktivitas extends Controller{
    public function index(){
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  

        $post_model = $this->model('post_model');
        $data = $post_model->getPostByIdUser($_SESSION['id_user']);

        $statusAktif = $post_model->getStatusPostById($_SESSION['id_user'], 'aktif');
        $statusSelesai = $post_model->getStatusPostById($_SESSION['id_user'], 'selesai');

        $int['status_aktif'] = $statusAktif;
        $int['status_selesai'] = $statusSelesai;

        $this->view('templates/header');
        $this->view('aktivitas/aktivitas', $data, $int);
        $this->view('templates/footer');
    }

    public function editPostingan($id){
         if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  

        $post_model = $this->model('post_model');
        $data = $post_model->getPostByKodePost($id);

        $this->view('templates/header');
        $this->view('aktivitas/editPostingan', $data);
        $this->view('templates/footer');
    }

    public function delete($id){
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  

        $post_model = $this->model('post_model');
        
        $post = $post_model->getPostByIdPost($id);
        
        if ($post) {
            $namaFile = $post['file_path'];
            $pathFoto = '../public/img/postingan/' . $namaFile;

            if (file_exists($pathFoto) && !empty($namaFile)) {
                unlink($pathFoto);
            }

            if ($post_model->deletePost($id) > 0) {
                header('location: '.BASEURL.'/aktivitas/');
                exit;
            }
        }
        
        header('location: '.BASEURL.'/aktivitas/');
        exit;
    }

    public function updatePostingan($id, $gambar){
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit; 
        }  

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('aktivitas/');
            return;
        }

        $data = $_POST;
        $data['id_postingan'] = $id;
        $data['foto_lama'] = $gambar;

        if(empty(trim($_POST['judul'] ?? ''))){
            $_SESSION['err'] = 'Form judul Wajib di isi!'; 
            $_SESSION['old_input'] = $_POST;
            header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
            exit;
        }

        if(empty(trim($_POST['tanggal'] ?? ''))){
            $_SESSION['err'] = 'Form tanggal kejadian Wajib di isi!'; 
            $_SESSION['old_input'] = $_POST;
            header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
            exit;
        }

        if(empty(trim($_POST['kategori'] ?? ''))){
            $_SESSION['err'] = 'Form kategori Wajib di isi!'; 
            $_SESSION['old_input'] = $_POST;
            header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
            exit;
        }

        if(empty(trim($_POST['lokasi'] ?? ''))){
            $_SESSION['err'] = 'Form lokasi Wajib di isi!'; 
            $_SESSION['old_input'] = $_POST;
            header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
            exit;
        }
        
        if(empty(trim($_POST['deskripsi'] ?? ''))){
            $_SESSION['err'] = 'Form deskripsi Wajib di isi!'; 
            $_SESSION['old_input'] = $_POST;
            header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
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
                    if (!empty($data['foto_lama'])) {
                        $pathFotoLama = '../public/img/postingan/' . $data['foto_lama'];
                        
                        if (file_exists($pathFotoLama)) {
                            unlink($pathFotoLama);
                        }
                    }
                    $data['foto_postingan'] = $namaFileBaru;
                } else {
                    $_SESSION['err'] = 'Gagal memindahkan file gambar.';
                    $_SESSION['old_input'] = $_POST;
                    header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
                    exit;
                }
            } else {
                $_SESSION['err'] = 'Ukuran File Gambar Lebih dari 10MB atau ekstensi salah';
                $_SESSION['old_input'] = $_POST;
                header('location: '.BASEURL.'/aktivitas/editPostingan/'.$id);
                exit;
            }
        }else{
            $data['foto_postingan'] = $data['foto_lama'];
        }

        $post_model = $this->model('post_model');
        $post_model->updatePost($data);

        unset($_SESSION['old_input']);
        header('location: '.BASEURL.'/aktivitas/');
    }
}