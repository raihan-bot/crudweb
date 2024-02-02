<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('MUser');
        $this->load->model('MDashboard'); // Model untuk dashboard
        $this->load->model('MStock'); 
    }

    public function index() {
        if (empty($_SESSION['username'])) {
            $this->load->view('Login');
        } else {
            redirect('admin/dashboard'); // Ganti 'admin' dengan sesuai dengan folder atau controller dashboard Anda
        }
    }
    

    public function validasi() {
        $this->load->model('MUser');

        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $hasil = $this->MUser->get_validasi($user, $pass);

        if ($hasil) {
            $this->session->set_userdata('username', $user);
            redirect('admin/dashboard'); // Redirect ke dashboard
        } else {
            $this->session->set_flashdata('salah', true);
            redirect('Admin');
        }
    }

    public function dashboard() {
        $this->load->model('MDashboard');
        $data['stock'] = $this->MDashboard->getAllData();
        $this->load->view('dashboard', $data);
    }
    

    public function stock() {
        $data['stock'] = $this->MStock->getAllStock();
        $this->load->view('stock', $data);
    }

    public function edit($idbarang) {
        // Ambil data barang berdasarkan ID
        $data['barang'] = $this->MStock->getStockById($idbarang);

        // Tampilkan form edit
        $this->load->view('admin/edit', $data);
        
        // Set pesan untuk memberi tahu halaman edit bahwa setelah edit harus kembali ke dashboard
        $this->session->set_flashdata('return_to_dashboard', true);
    }

    public function delete($idbarang) {
        // Proses delete data barang di sini
        $this->MStock->deleteStock($idbarang);

        // Set pesan untuk memberi tahu halaman delete bahwa setelah delete harus kembali ke dashboard
        $this->session->set_flashdata('return_to_dashboard', true);

        // Redirect kembali ke halaman dashboard setelah delete
        redirect('admin/dashboard');
    }
}
