<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_gambar_model extends CI_Model
{
    private $tabel = 'produk_gambar';

    // Simpan nama file baru
    public function tambah($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    // Ambil semua gambar berdasarkan id produk
    public function ambil_semua($id_produk)
    {
        $this->db->where('produk_id', $id_produk);
        return $this->db->get($this->tabel)->result_array();
    }

    // Ambil satu gambar berdasarkan id
    public function ambil_satu($id_gambar)
    {
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get($this->tabel)->row_array();
    }

    // Hapus gambar
    public function hapus($id_gambar)
    {
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->delete($this->tabel);
    }
}