<?php

class Aktivitas extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('aktivitas/index');
        $this->view('templates/footer');
    }
}