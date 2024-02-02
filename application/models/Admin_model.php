<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // Fungsi untuk mendapatkan semua data stock
    public function getStock() {
        $query = $this->db->get('stock');
        return $query->result_array();
    }

    // Fungsi untuk menambah barang
    public function tambah_barang($data) {
        $this->db->insert('stock', $data);
    }

    // Fungsi untuk menghapus barang
    public function hapus_barang($idbarang) {
        $this->db->where('idbarang', $idbarang);
        $this->db->delete('stock');
    }

    // Fungsi untuk mengedit barang
    public function edit_barang($idbarang, $data) {
        $this->db->where('idbarang', $idbarang);
        $this->db->update('stock', $data);
    }
}
?>
