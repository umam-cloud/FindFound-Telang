<?php

class Postingan extends Controller{
    public function index(){
        $post_model = $this->model('post_model');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filters = [
                'kategori' => (isset($_POST['kategori'])) ? $_POST['kategori'] : [],
                'status' => (isset($_POST['status'])) ? $_POST['status'] : 'semua',
                'waktu' =>  (isset($_POST['waktu'])) ? $_POST['waktu'] : 'all'
            ];
            $_SESSION['post_filters'] = $filters;
            $_GET['halaman'] = 1;
        }else {
            if (isset($_SESSION['post_filters'])) {
                $filters = $_SESSION['post_filters'];
            } else {
                $filters = [
                    'kategori' => [],
                    'status'   => 'semua',
                    'waktu'    => 'all'
                ];
            }
        }

        $search = (isset($_GET['search'])) ? $_GET['search'] : NULL;
        
        $getUrutan = (isset($_GET['urutan'])) ? $_GET['urutan'] : NULL;
        $urutan = (isset($getUrutan) && $getUrutan == 'terlama') ? 'ASC' : 'DESC';

        $limit = 6;
        $halamanAktif = (isset($_GET['halaman']) && is_numeric($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
        $offset = ($limit * $halamanAktif) - $limit;

        [
            'data' => $data['postingan'],
            'jumlahData' => $totalData
        ] = $post_model->getPostPagination($filters, $offset, $limit, $urutan, $search);

        $totalHalaman = ceil($totalData / $limit);

        $data['kategori'] = $post_model->getKategori();
        $data['halaman_aktif'] = $halamanAktif;
        $data['total_halaman'] = $totalHalaman;
        $data['total_data'] = $totalData;
        $data['urutan'] = $getUrutan;
        $data['keyword'] = $search;
        $data['filters'] = $filters;

        $this->view('templates/header');
        $this->view('postingan/postingan', $data);
        $this->view('templates/footer');
    }

    public function detailPostingan($kode){
        $post_model = $this->model('post_model');
        $data = $post_model->getPostByKodePost($kode);
        

        $this->view('templates/header');
        $this->view('postingan/detailPostingan', $data);
        $this->view('templates/footer');
    }

    public function updateStatusPostingan($kode){
        $post_model = $this->model('post_model');
        $post_model->updateStatus($kode);
        header('location: '.BASEURL.'/postingan/detailPostingan/'.$kode);
    }

    public function laporkan($id_postingan, $kode_postingan = null) {
        if (!isset($_SESSION['id_user'])) {
            header('location: '.BASEURL.'/auth');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'postingan_id' => $id_postingan,
                'pelapor_id' => $_SESSION['id_user'],
                'alasan' => $_POST['alasan_lapor']
            ];

            if ($this->model('Post_model')->tambahLaporanMasalah($data) > 0) {
                $_SESSION['swal_success'] = 'Laporan berhasil dikirim ke Admin!';
                header('Location: ' . BASEURL . '/postingan/detailPostingan/' . ($kode_postingan ?? $id_postingan));
                exit;
            } else {
                $_SESSION['swal_error'] = 'Gagal mengirim laporan.';
                header('Location: ' . BASEURL . '/postingan/detailPostingan/' . ($kode_postingan ?? $id_postingan));
                exit;
            }
        }
    }

}