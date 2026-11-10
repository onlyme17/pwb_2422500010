<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cek sesi login — sesuaikan dengan yang dipakai
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('produk_kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Kategori';
        $data['list_kategori'] = $this->produk_kategori_model->get_all();
        
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/kategori/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi_kategori', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            // ✅ Sesuai nama file kamu: tambah_kategori.php
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/kategori/tambah_kategori', $data);
            $this->load->view('administrator/templates/footer');
        } else {
            $simpan = [
                'nama' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi_kategori')
            ];
            $this->produk_kategori_model->tambah($simpan);
            
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success">Kategori berhasil ditambahkan!</div>');
            redirect('admin/kategori');
        }
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Kategori';
        $data['kategori'] = $this->produk_kategori_model->get_by_id($id);
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi_kategori', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            // ✅ Sesuai nama file kamu: ubah_kategori.php
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/kategori/ubah_kategori', $data);
            $this->load->view('administrator/templates/footer');
        } else {
            $update = [
                'nama' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi_kategori')
            ];
            $this->produk_kategori_model->ubah($id, $update);
            
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success">Kategori berhasil diperbarui!</div>');
            redirect('admin/kategori');
        }
    }

    public function hapus($id)
    {
        $this->produk_kategori_model->hapus($id);
        
        $this->session->set_flashdata('message', 
            '<div class="alert alert-success">Kategori berhasil dihapus!</div>');
        redirect('admin/kategori');
    }
}