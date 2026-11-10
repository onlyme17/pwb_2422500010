<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    private $table = 'pelanggan';

    public function get_by_email($email)
    {
        return $this->db->get_where($this->table, array('email' => $email))->row_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('id_pelanggan' => (int) $id))->row_array();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data) ? $this->db->insert_id() : false;
    }

    public function email_tersedia($email)
    {
        return $this->db->where('email', $email)->count_all_results($this->table) === 0;
    }
}
