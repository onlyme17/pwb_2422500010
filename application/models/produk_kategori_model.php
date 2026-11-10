<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_kategori_model extends CI_Model
{
    private $table = 'kategori';

    public function get_all()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id_kategori', $id)
                        ->get($this->table)
                        ->row_array();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function ubah($id, $data)
    {
        return $this->db->where('id_kategori', $id)
                        ->update($this->table, $data);
    }

    public function hapus($id)
    {
        return $this->db->where('id_kategori', $id)
                        ->delete($this->table);
    }
}