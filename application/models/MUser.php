<?php
class MUser extends CI_Model {

    public $table = 'login';

    // Insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        echo $this->db->last_query(); // Hapus ini jika tidak diperlukan
    }

    // Cocokkan username dan password di tabel
    function get_validasi($user, $pass) {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $total = $this->db->count_all_results($this->table);

        return ($total > 0) ? true : false;
    }
}

