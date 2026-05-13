<?php

class Aktivitas extends Controller{
    public function index(){
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
        $post_model = $this->model('post_model');
        $data = $post_model->getPostByIdPost($id);

        $this->view('templates/header');
        $this->view('aktivitas/editPostingan', $data);
        $this->view('templates/footer');
    }

    public function delete($id){
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('aktivitas/');
            return;
        }

        $data = $_POST;
        $data['id_postingan'] = $id;
        $data['foto_lama'] = $gambar;

        if (isset($_FILES['foto_postingan']) && $_FILES['foto_postingan']['error'] === 0) {
            
            $namaFile = $_FILES['foto_postingan']['name'];
            $ukuranFile = $_FILES['foto_postingan']['size'];
            $tmpName = $_FILES['foto_postingan']['tmp_name'];

            $ekstensiValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

            if (in_array($ekstensiGambar, $ekstensiValid) && $ukuranFile < 1000000) {
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
                }
            } else {
                $_SESSION['err'] = 'Ukuran File Gambar Lebih dari 10MB';
            }
        }else{
            $data['foto_postingan'] = $data['foto_lama'];
        }

        $post_model = $this->model('post_model');
        $post_model->updatePost($data);

        header('location: '.BASEURL.'/aktivitas/');
    }
}