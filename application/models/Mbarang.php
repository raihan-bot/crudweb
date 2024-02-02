<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MBarang extends CI_Model
{
    // Change this to match your actual table name
    private $table = 'stock';

    function __construct()
    {
        parent::__construct();
    }
    public function total_rows($q = NULL)
    {
        $this->db->like('idbarang', $q);
        $this->db->or_like('namabarang', $q);
        $this->db->or_like('kat', $q);
        // ... add other fields as needed ...

        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by('idbarang', 'ASC');
        $this->db->like('idbarang', $q);
        $this->db->or_like('namabarang', $q);
        $this->db->or_like('kat', $q);
        // ... add other fields as needed ...

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    // Get all data
    function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Get data by ID
    function get_by_id($id)
    {
        $this->db->where('idbarang', $id);
        return $this->db->get($this->table)->row();
    }

    // Insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Update data
    function update($id, $data)
    {
        $this->db->where('idbarang', $id);
        $this->db->update($this->table, $data);
    }

    // Delete data
    function delete($id)
    {
        $this->db->where('idbarang', $id);
        $this->db->delete($this->table);
    }

    // Check uniqueness of NIM
    public function check_unique_namabarang($namabarang, $id)
    {
        $this->db->where('namabarang', $namabarang);
        $this->db->where('idbarang !=', $id); // Exclude the current record being updated
        $query = $this->db->get($this->table);

        return $query->num_rows() > 0;
    }

    function download_excel()
    {
        $this->load->library('PHPExcel');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("barang_data")->setDescription("Barang Data");

        $objPHPExcel->setActiveSheetIndex(0);

        // Set headers
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama Barang');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Kategori');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Deskripsi');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Stock');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Minimum Stock');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Maximum Stock');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Loker');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Supplier');

        // Fetch data
        $barang_data = $this->db->get($this->table)->result();

        // Populate data
        $row = 2;
        foreach ($barang_data as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data->idbarang);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data->namabarang);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data->kat);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data->deskripsi);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data->stock);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data->MIN);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data->MAX);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data->loker);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data->Supplier);
            $row++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Barang Data');

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="barang_data.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
