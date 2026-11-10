<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KotaNimAnda_model extends CI_Model
{
    // Nama tabel dan kolom sesuai database project pwb_2422500010.
    private $table = 'kotanimanda';
    private $primary_key = 'id_kota010';

    public function get_all()
    {
        return $this->db->order_by($this->primary_key, 'DESC')
                        ->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where(
            $this->table,
            array($this->primary_key => (int) $id)
        )->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where($this->primary_key, (int) $id)
                        ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where($this->primary_key, (int) $id)
                        ->delete($this->table);
    }
}
