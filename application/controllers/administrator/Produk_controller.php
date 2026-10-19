<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('produk_model');
        $this->load->model('produk_kategori_model');
        $this->load->model('produk_gambar_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['list_produk'] = $this->produk_model->get_all();
        
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/produk/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_produk()
    {
        $data['title'] = 'Tambah Produk';
        
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $data['list_kategori'] = $this->produk_kategori_model->get_all();
            
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/produk/tambah', $data);
            $this->load->view('administrator/templates/footer');
        } else {
            $id_produk = $this->__simpan_produk();
            
            $jumlah_file = count($_FILES['gambar_produk']['name']);
            if ($jumlah_file > 0) {
                $this->__upload_dan_simpan($jumlah_file, $id_produk);
            }
            
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Produk berhasil ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('admin/produk');
        }
    }

    private function __simpan_produk()
    {
        $data = [
            'nama'        => ucwords($this->input->post('nama_produk')),
            'kategori_id' => $this->input->post('kategori_produk'),
            'harga'       => $this->input->post('harga_produk'),
            'stok'        => $this->input->post('stok_produk'),
            'deskripsi'   => ucfirst($this->input->post('deskripsi_produk'))
        ];
        return $this->produk_model->tambah($data);
    }

    // FUNGSI UTAMA: Upload otomatis & simpan nama file
    private function __upload_dan_simpan($jumlah_file, $id_produk)
    {
        // Pastikan folder ada
        if (!is_dir('./uploads/produk/')) {
            mkdir('./uploads/produk/', 0777, TRUE);
        }

        for ($i = 0; $i < $jumlah_file; $i++)
        {
            // Lewati jika tidak ada file dipilih
            if (empty($_FILES['gambar_produk']['name'][$i])) {
                continue;
            }

            // Ambil nama asli file
            $nama_asli = $_FILES['gambar_produk']['name'][$i];
            $sementara = $_FILES['gambar_produk']['tmp_name'][$i];

            // Pisahkan nama dan ekstensi
            $info = pathinfo($nama_asli);
            $nama_file = $info['filename'];       // Nama asli tanpa .jpg
            $ekstensi  = $info['extension'];      // jpg / png / gif

            // Buat nama baru otomatis: produk_id_namaAsli.jpg
            $nama_baru = 'produk_' . $id_produk . '_' . ($i+1) . '.' . strtolower($ekstensi);

            // Lokasi simpan
            $tujuan = './uploads/produk/' . $nama_baru;

            // Pindahkan file
            if (move_uploaded_file($sementara, $tujuan))
            {
                // Simpan nama file ke database
                $data = [
                    'nama_gambar' => $nama_baru,
                    'produk_id'   => $id_produk
                ];
                $this->produk_gambar_model->tambah($data);
            }
        }
    }

    public function ubah_produk($id)
    {
        $data['title'] = 'Ubah Produk';
        $data['produk'] = $this->produk_model->get_by_id($id);
        $data['gambar'] = $this->produk_gambar_model->ambil_semua($id);
        $data['list_kategori'] = $this->produk_kategori_model->get_all();
        
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/produk/ubah', $data);
            $this->load->view('administrator/templates/footer');
        } else {
            $this->__perbarui_produk($id);
            
            $jumlah_file = count($_FILES['gambar_produk']['name']);
            if ($jumlah_file > 0) {
                $this->__upload_dan_simpan($jumlah_file, $id);
            }
            
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Produk berhasil diperbarui!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('admin/produk/ubah/' . $id);
        }
    }

    private function __perbarui_produk($id)
    {
        $data = [
            'nama'        => ucwords($this->input->post('nama_produk')),
            'kategori_id' => $this->input->post('kategori_produk'),
            'harga'       => $this->input->post('harga_produk'),
            'stok'        => $this->input->post('stok_produk'),
            'deskripsi'   => ucfirst($this->input->post('deskripsi_produk'))
        ];
        $this->produk_model->ubah($data, $id);
    }

    public function hapus_satu_gambar($id_gambar, $id_produk)
    {
        $gambar = $this->produk_gambar_model->ambil_satu($id_gambar);
        if ($gambar) {
            $lokasi = './uploads/produk/' . $gambar['nama_gambar'];
            if (file_exists($lokasi)) {
                unlink($lokasi);
            }
            $this->produk_gambar_model->hapus($id_gambar);
        }
        redirect('admin/produk/ubah/' . $id_produk);
    }

    public function hapus_produk($id)
    {
        $produk = $this->produk_model->get_by_id($id);
        if ($produk) {
            $semua_gambar = $this->produk_gambar_model->ambil_semua($id);
            foreach ($semua_gambar as $gbr) {
                $lokasi = './uploads/produk/' . $gbr['nama_gambar'];
                if (file_exists($lokasi)) {
                    unlink($lokasi);
                }
                $this->produk_gambar_model->hapus($gbr['id_gambar']);
            }
            $this->produk_model->hapus($id);
            
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Produk berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }
        redirect('admin/produk');
    }
}