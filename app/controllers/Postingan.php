<?php

class Postingan extends Controller{
    public function index(){
        $post_model = $this->model('post_model');

        $limit = 6;
        $halamanAktif = (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
        $offset = ($limit * $halamanAktif) - $limit;
        $totalData = $post_model->getRowAllPost();
        $totalHalaman = ceil($totalData / $limit);

        $data['postingan'] = $post_model->getPostPagination($offset, $limit);
        $data['halaman_aktif'] = $halamanAktif;
        $data['total_halaman'] = $totalHalaman;
        $data['total_data'] = $totalData;

        $this->view('templates/header');
        $this->view('postingan/postingan', $data);
        $this->view('templates/footer');
    }

    public function detailPostingan($id){
        $post_model = $this->model('post_model');
        $data = $post_model->getPostByIdPost($id);
        

        $this->view('templates/header');
        $this->view('postingan/detailPostingan', $data);
        $this->view('templates/footer');
    }

    public function updateStatusPostingan($id){
        $post_model = $this->model('post_model');
        $post_model->updateStatus($id);
        header('location: '.BASEURL.'/postingan/detailPostingan/'.$id);
    }

}