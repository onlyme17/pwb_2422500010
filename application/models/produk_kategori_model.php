<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_kategori_model extends CI_Model {
    private $table = 'kategori';

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get($this->table)->row_array();
    }

    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() === 1);
    }

    public function ubah($data, $id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() >= 0);
    }

    public function hapus($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() === 1);
    }
}