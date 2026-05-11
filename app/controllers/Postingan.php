<?php

class Postingan extends Controller{
    public function index(){
        $post_model = $this->model('post_model');
        $data = $post_model->getAllPost();
        $int = $post_model->getRowAllPost();
 

        $this->view('templates/header');
        $this->view('postingan/postingan', $data, $int);
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