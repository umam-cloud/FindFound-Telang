<?php

class Laporan extends Controller{
    public function index(){
        $this->view('templates/header');
        $this->view('laporan/laporan');
        $this->view('templates/footer');
    }
}