<?php
class Crud extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('Crud_model'); // Memuat model
  }
  
  public function index() {
    $data['records'] = $this->Crud_model->get_all_data(); // Mendapatkan semua data dari model
    $this->load->view('crud_view', $data); // Menampilkan data dalam view
  }
  
  // Fungsi untuk menambahkan data baru
  public function create() {
    // Lakukan validasi data input jika diperlukan
    
    $data = array(
      'kodeBarang' => $this->input->post('kodeBarang'),
      'namaBarang' => $this->input->post('namaBarang'),
      'harga' => $this->input->post('harga'),
      'jumlah' => $this->input->post('jumlah'),
    );
    
    $insert_id = $this->Crud_model->create_data($data); // Menambahkan data baru menggunakan model
    // Lakukan penanganan sukses atau gagal sesuai kebutuhan
    
    redirect('crud/index'); // Redirect kembali ke halaman utama setelah penambahan data
  }
  
  // Fungsi untuk mengedit data
  public function edit($id) {
    $data['record'] = $this->Crud_model->read_data($id); // Mendapatkan data berdasarkan ID
    
    // Lakukan validasi jika data tidak ditemukan atau diperlukan
    
    $this->load->view('edit_view', $data); // Menampilkan form edit dengan data yang ditemukan
  }
  
  // Fungsi untuk menyimpan perubahan data yang diedit
  public function update($id) {
    // Lakukan validasi data input jika diperlukan
    
    $data = array(
      'kodeBarang' => $this->input->post('kodeBarang'),
      'namaBarang' => $this->input->post('namaBarang'),
      'harga' => $this->input->post('harga'),
      'jumlah' => $this->input->post('jumlah'),
    );
    
    $this->Crud_model->update_data($id, $data); // Mengupdate data menggunakan model
    // Lakukan penanganan sukses atau gagal sesuai kebutuhan
    
    redirect('crud/index'); // Redirect kembali ke halaman utama setelah pembaruan data
  }
  
  // Fungsi untuk menghapus data
  public function delete($id) {
    $this->Crud_model->delete_data($id); // Menghapus data berdasarkan ID menggunakan model
    // Lakukan penanganan sukses atau gagal sesuai kebutuhan
    
    redirect('crud/index'); // Redirect kembali ke halaman utama setelah penghapusan data
  }
}
?>
