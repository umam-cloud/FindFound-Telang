<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth extends Controller{
    public function index(){
        $this->view('auth/login');
    }

    public function googleAuth() {
        $data = json_decode(file_get_contents('php://input'), true);
        $id_token = $data['token'];

        $arrContextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

        $url = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
        $response = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $payload = json_decode($response, true);

        if (isset($payload['email'])) {
            $userModel = $this->model('User_model');
            $user = $userModel->getUserByEmail($payload['email']);

            if (!$user) {
                $userModel->tambahData([
                    'nama' => $payload['name'],
                    'email' => $payload['email'],
                    'whatsapp' => '-', 
                    'password' => password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT)
                ]);
                $user = $userModel->getUserByEmail($payload['email']);
            }

            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['foto_profil'] = $user['foto_profil'];
            
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit;
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('auth/login');
            return;
        }

        if (isset($_POST['email'], $_POST['password'])) {
            $user_model = $this->model('user_model');
            $user = $user_model->getUserByEmail($_POST['email']);
            
            if (!$user) {
                $_SESSION['err'] = 'Email Tidak Terdaftar';
                header('location: '.BASEURL.'/auth/');
                return;
            }
                
            if (!password_verify($_POST['password'], $user['password'])) {
                $_SESSION['err'] = 'Password Tidak Ditemukan';
                header('location: '.BASEURL.'/auth/');
                return;
            }
    
            $_SESSION['Login'] = TRUE;
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['foto_profil'] = $user['foto_profil'];
    
            header('location: '.BASEURL.'/home');
            exit;
        }else{
            header('location: '.BASEURL.'/auth/');
        }
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('auth/register');
            return;
        }

        if (isset($_POST['nama'], $_POST['password'], $_POST['whatsapp'], $_POST['email'])) {
            $user_model = $this->model('user_model');
            $uniqe = $user_model->getUserByEmail($_POST['email']);

            if ($uniqe['email']) {
                $_SESSION['err'] = 'Email Sudah Digunakan';
                header('location: '.BASEURL.'/auth/register');
                return;
            }

            $data_user = [
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'whatsapp' => $_POST['whatsapp'],
                'password' => $_POST['password']
            ];

            $user_model->tambahData($data_user);

            unset($_POST);
            header('location: '.BASEURL.'/auth');
            exit;
        }else{
            header('location: '.BASEURL.'/auth/register');
        }

    }

    public function logout(){
        $_SESSION = [];
        session_unset();
        session_destroy();

        header('location: ' . BASEURL . '/auth');
        exit;
    }

    
}