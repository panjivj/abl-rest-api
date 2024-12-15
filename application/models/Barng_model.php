<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
    protected $table = 'barang';

    public function get_all_barang() {
        return $this->db->get($this->table)->result();
    }

    public function get_barang($id) {
        return $this->db->get_where($this->table, ['Kode' => $id])->row();
    }

    public function insert_barang($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_barang($id, $data) {
        return $this->db->where('Kode', $id)->update($this->table, $data);
    }

    public function delete_barang($id) {
        return $this->db->where('Kode', $id)->delete($this->table);
    }
}
