<?php

class Laporan extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('laporan/index');
        $this->view('templates/footer');
    }
}