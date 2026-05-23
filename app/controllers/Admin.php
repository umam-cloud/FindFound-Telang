<?php

class Admin extends Controller {
    public function index() {
        $data['judul'] = 'Admin Dashboard';

        $user_model = $this->model('User_model');
        $post_model = $this->model('Post_model');

        $pengguna = $user_model->totalUser();
        $post_temuan = $post_model->getPostByJenis('temuan');
        $post_hilang = $post_model->getPostByJenis('hilang');
        
        $data['total_pengguna'] = $pengguna;
        $data['post_temuan'] = $post_temuan;
        $data['post_hilang'] = $post_hilang;

        
        $this->view('admin/templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('admin/templates/footer');
    }
}
