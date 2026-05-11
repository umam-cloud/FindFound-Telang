<?php

class Home extends Controller {
    public function index() {
        if (isset($_SESSION['id_user'])) {
            $this->beranda();
            exit; 
        }
        $this->view('auth/login');
    }

    public function beranda(){
        $post_model = $this->model('Post_model');
        $post = $post_model->getNewPost();
        
        $this->view('templates/header');
        $this->view('home/index', $post);
        $this->view('templates/footer');
    }
}