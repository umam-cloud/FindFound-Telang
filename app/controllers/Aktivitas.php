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
}