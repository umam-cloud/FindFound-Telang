<?php

class Home extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('Home/index');
        $this->view('templates/footer');
    }
}