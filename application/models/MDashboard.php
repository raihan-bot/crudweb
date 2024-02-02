<?php
class MDashboard extends CI_Model {

public function getAllData()
{
    $result = $this->db->get('stock')->result_array();

    // Tambahkan baris berikut untuk melihat query yang dihasilkan
    var_dump($this->db->last_query());

    return $result;
}

}
