<?php

class Home extends Controller {
    public function index() {
        $this->beranda();
    }

    public function beranda(){
        $post_model = $this->model('Post_model');

        $search = (isset($_GET['search'])) ? $_GET['search'] : NULL;
        
        $posts = $post_model->getNewPost($search);
        $data['keyword'] = $search;
        $data['posts'] = $posts;

        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}