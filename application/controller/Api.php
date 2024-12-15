<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    // GET: Retrieve all data
    public function barang_get($id = null) {
        $result = $id ? $this->Barang_model->get_barang($id) : $this->Barang_model->get_all_barang();
        if ($result) {
            echo json_encode(['status' => 'success', 'data' => $result]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data not found']);
        }
    }

    // POST: Add new data
    public function barang_post() {
        $data = $this->input->post();
        $this->form_validation->set_rules('Nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('Stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run()) {
            $this->Barang_model->insert_barang($data);
            echo json_encode(['status' => 'success', 'message' => 'Data added']);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }

    // PUT: Update data
    public function barang_put($id) {
        parse_str(file_get_contents("php://input"), $data);
        if ($this->Barang_model->update_barang($id, $data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data updated']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update data']);
        }
    }

    // DELETE: Remove data
    public function barang_delete($id) {
        if ($this->Barang_model->delete_barang($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Data deleted']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete data']);
        }
    }
}
