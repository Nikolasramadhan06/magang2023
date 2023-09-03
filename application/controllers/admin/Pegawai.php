<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('DataModel'); // Load your DataModel
    }

	public function index()
	{
		// Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        // Get the logged-in admin's id from session
        $admin_id = $this->session->userdata('admin_id');
		$data['title'] = "Informasi";
		$data['fasilitas'] = $this->db->get('fasilitas')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/pegawai', $data);
		$this->load->view('template_admin/footer');

	}
	
	public function edit($id)
	{
		$data['title'] = "Edit Kegiatan";
		$where = array('id_fasilitas' => $id);
	
		$data['fasilitas'] = $this->db->get_where('fasilitas', $where)->row_array();
	
		if ($this->input->post('submit')) {
			// Proses penyimpanan data yang diedit ke dalam tabel kegiatan
			$updated_data = array(
				// Isi dengan field-field yang akan di-update dan nilainya
				'nama_field' => $this->input->post('input_nama_field'),
				'deskripsi_field' => $this->input->post('input_deskripsi_field')
				// Tambahkan field-field lain sesuai kebutuhan
			);
	
			$this->db->where('id_fasilitas', $id);
			$this->db->update('fasilitas', $updated_data);
	
			// Set flashdata untuk memberi pesan sukses
			$this->session->set_flashdata('message', 'Data kegiatan berhasil diupdate.');
			
			// Redirect ke halaman daftar kegiatan atau halaman lain yang diinginkan
			redirect('admin/dashboard');
		} else {
			// Tampilkan halaman edit dengan data yang telah diambil dari database
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/topbar');
			$this->load->view('admin/Edit-pegawai', $data);
			$this->load->view('template_admin/footer');
		}
	}

	public function edit_aksi()
	{
		$id 		= $this->input->post('id_fasilitas');
		$nama	= htmlspecialchars($this->input->post('nama', true));
		$isi		= htmlspecialchars($this->input->post('isi', true));
		$photo		= $_FILES['gambar']['name'];
			if($photo){
				$config ['upload_path']		= './assets/user/img';
				$config ['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$photo = $this->upload->data('file_name');
					$this->db->set('gambar', $photo);
				}else{
					echo "Gagal upload";
				}
			}

		$data = array(
			'gambar' => $photo,
			'nama'  => $nama,
			'isi'	=> $isi,
		);

		$where = array(
			'id_fasilitas' => $id
		);

		$this->DataModel->update_data('fasilitas', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!.
              </div>');
		redirect('admin/pegawai');
	}
	public function tambah()
{
    $data['title'] = "Tambah Kegiatan";

    if ($this->input->post('submit')) {
        // Proses form submit (sama seperti yang sudah ada)
    }

    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('template_admin/topbar');
    $this->load->view('admin/tambah-kegiatan', $data); // Buat view tambah-kegiatan.php
    $this->load->view('template_admin/footer');
}




	

}