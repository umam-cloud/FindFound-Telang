<?php

class Home extends Controller {
    public function index() {
        if (isset($_SESSION['id_user'])) {
            $this->activity();
            exit; 
        }
        $this->view('auth/login');
    }

    public function activity(){
        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}