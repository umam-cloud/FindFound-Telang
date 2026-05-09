<?php

class Profile extends Controller{
    public function index(){
        $user_model = $this->model('user_model');
        $user = $user_model->getUserById($_SESSION['id_user']); 

        $this->view('templates/header');
        $this->view('profile/profile', $user);
        $this->view('templates/footer');
    }
    
    public function editProfile(){
        $user_model = $this->model('user_model');
        $user = $user_model->getUserById($_SESSION['id_user']); 

        $this->view('templates/header');
        $this->view('profile/editProfile', $user);
        $this->view('templates/footer');
    }

    public function updateProfile(){
         if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('profile/editProfile');
            return;
        }

        $_POST['id'] = $_SESSION['id_user'];
        $data = $_POST;

        if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] === 0) {
            
            $namaFile = $_FILES['foto_profil']['name'];
            $ukuranFile = $_FILES['foto_profil']['size'];
            $tmpName = $_FILES['foto_profil']['tmp_name'];

            $ekstensiValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

            if (in_array($ekstensiGambar, $ekstensiValid) && $ukuranFile < 2000000) {
                

                $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                $tujuan = '../public/img/profile/' . $namaFileBaru;
                
                if (move_uploaded_file($tmpName, $tujuan)) {
                    if (!empty($data['foto_lama']) && file_exists('../public/img/profile/' . $data['foto_lama'])) {
                        unlink('../public/img/profile/' . $data['foto_lama']);
                    }
                    $_SESSION['foto_profil'] = $namaFileBaru;
                    $data['foto_profil'] = $namaFileBaru;
                }
            } else {
                $_SESSION['foto_profil'] = $data['foto_lama'];
                $data['foto_profil'] = $data['foto_lama'];
            }
        } else {
            $data['foto_profil'] = $data['foto_lama'];
        }


        
        $user_model = $this->model('user_model');
        $accept = $user_model->updateData($data); 

        header('location: '.BASEURL.'/profile/');

    }
}