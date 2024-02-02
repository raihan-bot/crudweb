<?php
class MStock extends CI_Model {

    public function getAllStock()
    {
        // Ambil semua data barang
        return $this->db->get('stock')->result_array();
        // Gantilah 'nama_tabel_barang' dengan nama tabel yang sesuai di database Anda
    }

    public function getStockById($idbarang)
    {
        // Ambil data barang berdasarkan ID
        $this->db->where('idbarang', $idbarang);
        return $this->db->get('stock')->row_array();
        // Gantilah 'nama_tabel_barang' dengan nama tabel yang sesuai di database Anda
    }

    public function deleteStock($idbarang) {
        // Hapus data barang berdasarkan ID
        $this->db->where('idbarang', $idbarang);
        $this->db->delete('stock');
        // Gantilah 'stock' dengan nama tabel yang sesuai di database Anda
    }
    
}

