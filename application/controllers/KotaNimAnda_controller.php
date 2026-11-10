<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KotaNimAnda_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KotaNimAnda_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));

        // Sesuai dengan session pada Admin_auth_controller.php project asli.
        if (!$this->session->userdata('admin_login')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $this->_render('Master Kota', null, null);
    }

    public function tambah()
    {
        if ($this->input->method(TRUE) === 'POST') {
            $this->_rules();
            if ($this->form_validation->run()) {
                $this->KotaNimAnda_model->insert($this->_post_data());
                $this->session->set_flashdata('pesan', 'Data kota berhasil ditambahkan.');
                redirect('KotaNimAnda_controller');
                return;
            }
        }
        $this->_render('Tambah Data Kota', site_url('KotaNimAnda_controller/tambah'), null);
    }

    public function ubah($id = null)
    {
        if ($id === null || !ctype_digit((string) $id)) {
            show_404();
            return;
        }

        $row = $this->KotaNimAnda_model->get_by_id((int) $id);
        if (!$row) {
            show_404();
            return;
        }

        if ($this->input->method(TRUE) === 'POST') {
            $this->_rules();
            if ($this->form_validation->run()) {
                $this->KotaNimAnda_model->update((int) $id, $this->_post_data());
                $this->session->set_flashdata('pesan', 'Data kota berhasil diubah.');
                redirect('KotaNimAnda_controller');
                return;
            }
        }
        $this->_render('Ubah Data Kota', site_url('KotaNimAnda_controller/ubah/' . (int) $id), $row);
    }

    public function hapus($id = null)
    {
        if ($id === null || !ctype_digit((string) $id)) {
            show_404();
            return;
        }

        $this->KotaNimAnda_model->delete((int) $id);
        $this->session->set_flashdata('pesan', 'Data kota berhasil dihapus.');
        redirect('KotaNimAnda_controller');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_kota010', 'Nama Kota', 'required|trim|max_length[500');
        $this->form_validation->set_rules('jenis_kota010', 'Jenis Kota', 'required|in_list[Kota,Kabupaten]');
        $this->form_validation->set_rules('provinsi010', 'Provinsi', 'required|trim|max_length[500]');
        $this->form_validation->set_rules('status010', 'Status', 'required|in_list[Aktif,Tidak Aktif]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }

    private function _post_data()
    {
        return array(
            'nama_kota010' => trim((string) $this->input->post('nama_kota010', TRUE)),
            'jenis_kota010' => $this->input->post('jenis_kota010', TRUE),
            'provinsi010' => trim((string) $this->input->post('provinsi010', TRUE)),
            'status010' => $this->input->post('status010', TRUE)
        );
    }

    private function _render($judul, $form_aksi, $row_form)
    {
        $data = array(
            'title' => $judul . ' - SIPENDAKUR',
            'judul' => $judul,
            'kota' => $this->KotaNimAnda_model->get_all(),
            'form_aksi' => $form_aksi,
            'row_form' => $row_form
        );

        // Gunakan layout AdminLTE project asli agar sidebar tetap tampil.
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('KotaNimAnda/index', $data);
        $this->load->view('administrator/templates/footer');
    }
}
