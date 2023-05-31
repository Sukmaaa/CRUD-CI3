<?php
class Crud_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
    $this->load->database(); // Menginisialisasi koneksi ke database
  }
  
  // Fungsi untuk membuat data baru
  public function create_data($data) {
    $this->db->insert('produk', $data);
    return $this->db->insert_id();
  }
  
  // Fungsi untuk membaca data berdasarkan ID
  public function read_data($id) {
    $query = $this->db->get_where('produk', array('kodeBarang' => $id));
    return $query->row_array();
  }
  
  // Fungsi untuk memperbarui data berdasarkan ID
  public function update_data($id, $data) {
    $this->db->where('kodeBarang', $id);
    $this->db->update('produk', $data);
  }
  
  // Fungsi untuk menghapus data berdasarkan ID
  public function delete_data($id) {
    $this->db->where('kodeBarang', $id);
    $this->db->delete('produk');
  }
  
  // Fungsi untuk mendapatkan semua data
  public function get_all_data() {
    $query = $this->db->get('produk');
    return $query->result_array();
  }
}
?>