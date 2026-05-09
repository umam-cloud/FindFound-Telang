<?php

class Postingan extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('postingan/postingan');
        $this->view('templates/footer');
    }

    public function detailPostingan(){
        $this->view('templates/header');
        $this->view('postingan/detailPostingan');
        $this->view('templates/footer');
    }
}