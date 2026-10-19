<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('produk_kategori_model'); // Muat model
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        // Ambil semua data kategori untuk ditampilkan di halaman utama
        $data['list_kategori'] = $this->produk_kategori_model->get_all();
        
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        // Tampilkan daftar kategori di halaman utama
        $this->load->view('administrator/kategori/index', $data);
        $this->load->view('administrator/templates/footer');
    }
}