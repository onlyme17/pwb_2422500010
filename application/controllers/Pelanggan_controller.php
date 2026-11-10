<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model', 'pelanggan_model');
        $this->load->model('Produk_model', 'produk_model');
        $this->load->model('Produk_gambar_model', 'produk_gambar_model');
    }

    private function render($view, $data = array())
    {
        $data['pelanggan_login'] = $this->session->userdata('pelanggan_login');
        $this->load->view('ecom/template/header', $data);
        if ($view === 'home') {
            $this->load->view('ecom/template/carousel', $data);
        }
        $this->load->view('ecom/' . $view, $data);
        $this->load->view('ecom/template/footer');
    }

    public function index()
    {
        $keyword = trim((string) $this->input->get('q', true));
        $data['title'] = 'Beranda | Toko Online';
        $data['keyword'] = $keyword;
        $data['list_produk'] = $this->produk_model->get_all($keyword);
        $data['gambar_produk'] = array();
        foreach ($data['list_produk'] as $produk) {
            $data['gambar_produk'][$produk['id_produk']] = $this->produk_gambar_model->ambil_semua($produk['id_produk']);
        }
        $this->render('home', $data);
    }

    public function login()
    {
        if ($this->session->userdata('pelanggan_login')) redirect('');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === false) {
            $this->render('pelanggan_login', array('title' => 'Login Pelanggan'));
            return;
        }

        $email = strtolower(trim($this->input->post('email', true)));
        $password = (string) $this->input->post('password');
        $pelanggan = $this->pelanggan_model->get_by_email($email);
        $valid = false;
        if ($pelanggan && !empty($pelanggan['password'])) {
            $stored = $pelanggan['password'];
            $info = password_get_info($stored);
            if (!empty($info['algo'])) {
                $valid = password_verify($password, $stored);
            } else {
                // Kompatibilitas untuk akun lama yang memakai MD5/SHA1.
                $valid = hash_equals(strtolower($stored), md5($password)) || hash_equals(strtolower($stored), sha1($password));
                if ($valid) {
                    $this->db->where('id_pelanggan', $pelanggan['id_pelanggan'])->update('pelanggan', array('password' => password_hash($password, PASSWORD_DEFAULT)));
                }
            }
        }

        if ($valid) {
            $this->session->sess_regenerate(true);
            $this->session->set_userdata('pelanggan_login', array(
                'id' => (int) $pelanggan['id_pelanggan'],
                'email' => $pelanggan['email'],
                'nama' => $pelanggan['nama_pelanggan']
            ));
            redirect('profil');
            return;
        }
        $this->session->set_flashdata('message', 'Email atau password tidak sesuai.');
        redirect('login');
    }

    public function register()
    {
        if ($this->session->userdata('pelanggan_login')) redirect('profil');
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('telepon', 'Nomor telepon', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('kode_pos', 'Kode pos', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'required|matches[password]');

        if ($this->form_validation->run() === false) {
            $this->render('pelanggan_register', array('title' => 'Registrasi Pelanggan'));
            return;
        }

        $email = strtolower(trim($this->input->post('email', true)));
        if (!$this->pelanggan_model->email_tersedia($email)) {
            $this->session->set_flashdata('message', 'Email sudah terdaftar. Silakan gunakan email lain atau login.');
            redirect('register');
            return;
        }

        $data = array(
            'nama_pelanggan' => trim($this->input->post('nama', true)),
            'email' => $email,
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp_pelanggan' => trim($this->input->post('telepon', true)),
            'alamat' => trim($this->input->post('alamat', true)),
            'kota' => trim($this->input->post('kota', true)),
            'kode_pos' => trim($this->input->post('kode_pos', true)),
            'provinsi' => trim($this->input->post('provinsi', true))
        );
        if ($this->pelanggan_model->tambah($data)) {
            $this->session->set_flashdata('message', 'Registrasi berhasil. Silakan login menggunakan akun Anda.');
            redirect('login');
        } else {
            $this->session->set_flashdata('message', 'Registrasi belum berhasil. Silakan coba kembali.');
            redirect('register');
        }
    }


    public function tambah_keranjang($id = 0)
    {
        $produk = $this->produk_model->get_by_id((int) $id);
        if (!$produk) {
            show_404();
            return;
        }
        $cart = $this->session->userdata('keranjang');
        if (!is_array($cart)) $cart = array();
        $key = (int) $id;
        $qty = isset($cart[$key]) ? (int) $cart[$key] : 0;
        $cart[$key] = min($qty + 1, max(1, (int) $produk['stok']));
        $this->session->set_userdata('keranjang', $cart);
        $this->session->set_flashdata('message', 'Produk berhasil ditambahkan ke keranjang.');
        redirect('keranjang');
    }

    public function keranjang()
    {
        $cart = $this->session->userdata('keranjang');
        if (!is_array($cart)) $cart = array();
        $items = array();
        $total = 0;
        foreach ($cart as $id => $qty) {
            $produk = $this->produk_model->get_by_id((int) $id);
            if ($produk) {
                $produk['jumlah'] = (int) $qty;
                $produk['subtotal'] = (float) $produk['harga'] * (int) $qty;
                $total += $produk['subtotal'];
                $items[] = $produk;
            }
        }
        $this->render('keranjang', array('title' => 'Keranjang Belanja', 'items' => $items, 'total' => $total));
    }

    public function hapus_keranjang($id = 0)
    {
        $cart = $this->session->userdata('keranjang');
        if (!is_array($cart)) $cart = array();
        unset($cart[(int) $id]);
        $this->session->set_userdata('keranjang', $cart);
        redirect('keranjang');
    }

    public function profil()
    {
        $login = $this->session->userdata('pelanggan_login');
        if (!$login) {
            $this->session->set_flashdata('message', 'Silakan login terlebih dahulu untuk melihat profil.');
            redirect('login');
            return;
        }
        $pelanggan = $this->pelanggan_model->get_by_id($login['id']);
        if (!$pelanggan) {
            $this->session->unset_userdata('pelanggan_login');
            redirect('login');
            return;
        }
        $this->render('pelanggan_profil', array('title' => 'Profil Pelanggan', 'pelanggan' => $pelanggan));
    }

    public function logout()
    {
        $this->session->unset_userdata('pelanggan_login');
        $this->session->sess_regenerate(true);
        $this->session->set_flashdata('message', 'Anda berhasil logout.');
        redirect('');
    }
}
