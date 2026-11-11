<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $table = "produk";

    public function get_all()
    {
        $this->db->select('produk.id_produk, produk.nama as pd_nama, produk.stok, 
                           produk.deskripsi, produk.harga, kategori.nama as kt_nama');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        return $this->db->get()->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_produk' => $id])->row_array();
    }

    public function ubah($data, $id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update($this->table, $data);
    }

    public function hapus($id)
    {
        $this->db->delete($this->table, ['id_produk' => $id]);
    }
}