<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MBarang'); // Change the model name to MBarang
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = @urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        $config['base_url'] = base_url() . 'CRUD/index.html'; // Change to match your controller and method
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MBarang->total_rows($q); // Adjust the model name to MBarang
        $barang = $this->MBarang->get_limit_data($config['per_page'], $start, $q);
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'barang_data' => $barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        
        $this->load->view('Stock', $data); // Adjust the view file name to barang_list
        
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('CRUD/create_action'),
            'idbarang' => set_value('idbarang'),
            'namabarang' => set_value('namabarang'),
            'kat' => set_value('kat'),
            'loker' => set_value('loker'),
            'stock' => set_value('stock'),
        );
        $this->load->view('barang_formm', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'namabarang' => $this->input->post('namabarang', TRUE),
                'kat' => $this->input->post('kat', TRUE),
                'loker' => $this->input->post('loker', TRUE),
                'stock' => $this->input->post('stock', TRUE),
            );

            $this->MBarang->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
            redirect(site_url('admin/dashboard'));
        }
    }
    public function dashboard()
    {
        $this->load->view('Dashboard');
    }

    public function update($idbarang)
    {
        $row = $this->MBarang->get_by_id($idbarang);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('CRUD/update_action'),
                'idbarang' => $row->idbarang,
                'namabarang' => $row->namabarang,
                'kat' => $row->kat,
                'loker' => $row->loker,
                'stock' => $row->stock,
            );
            $this->load->view('barang_formm', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CRUD'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbarang', TRUE));
        } else {
            $data = array(
                'namabarang' => $this->input->post('namabarang', TRUE),
                'kat' => $this->input->post('kat', TRUE),
                'loker' => $this->input->post('loker', TRUE),
                'stock' => $this->input->post('stock', TRUE),
            );

            $this->MBarang->update($this->input->post('idbarang', TRUE), $data);

            $this->session->set_flashdata('message', 'Data berhasil diupdate');
            redirect(site_url('admin/dashboard'));
        }
    }

    public function delete($idbarang)
    {
        $row = $this->MBarang->get_by_id($idbarang);

        if ($row) {
            $this->MBarang->delete($idbarang);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            redirect(site_url('admin/dashboard'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/dashboard'));
        }
    }

    private function _rules()
    {
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('kat', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('loker', 'loker', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
    }
}
