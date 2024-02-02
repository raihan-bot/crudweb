<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEditController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('admin_model');
        // Load form_validation library
        $this->load->library('form_validation');
    }

    public function stock() {
        // Panggil model untuk mendapatkan data stock barang
        $data['stock'] = $this->admin_model->getStock();

        // Tampilkan view dengan data stock
        $this->load->view('admin/stock', $data);
    }

    public function delete_stock($idbarang) {
        // Panggil model untuk menghapus data stock barang
        $this->admin_model->deleteStock($idbarang);

        // Redirect ke halaman stock setelah menghapus data
        redirect('admin/stock');
    }
}
