<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

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
		$data['title'] = "Slide";
		$where = array('admin_id' => $admin_id);
		$data['slide'] = $this->db->get_where('slide', $where)->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/slide', $data);
		$this->load->view('template_admin/footer');

	}
	
	public function edit($id)
	{
		$data['title'] = "Edit Slide";
		$where = array('id_gambar' => $id);
	
		$data['slide'] = $this->db->get_where('slide', $where)->row_array();
	
		if ($this->input->post('submit')) {
			// Proses penyimpanan data yang diedit ke dalam tabel gambar
			$updated_data = array(
				// Isi dengan field-field yang akan di-update dan nilainya
				'nama_field' => $this->input->post('input_nama_field'),
				'deskripsi_field' => $this->input->post('input_deskripsi_field')
				// Tambahkan field-field lain sesuai kebutuhan
			);
	
			$this->db->where('id_gambar', $id);
			$this->db->update('slide', $updated_data);
	
			// Set flashdata untuk memberi pesan sukses
			$this->session->set_flashdata('message', 'Data gambar berhasil diupdate.');
			
			// Redirect ke halaman daftar gambar atau halaman lain yang diinginkan
			redirect('admin/slide');
		} else {
			// Tampilkan halaman edit dengan data yang telah diambil dari database
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/topbar');
			$this->load->view('admin/Edit-slide', $data);
			$this->load->view('template_admin/footer');
		}
	}

	public function aksiSlide()
	{
		$id 		= $this->input->post('id_gambar');
		
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
			'gambar'  => $photo,
		);
		
		$where = array(
			'id_gambar' => $id
		);
		


		$this->DataModel->update_data('slide', $data, $where);
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!..
              </div>');
		redirect('admin/slide');
	}


	public function hapusslide($id_gambar)
	{
		// Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
		$id_gambar = $this->db->escape_str($id_gambar);
	
		// SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
		$this->db->where('id_gambar', $id_gambar);
		$this->db->delete('slide');
	
		// Redirect atau lakukan aksi lain setelah penghapusan
		redirect('admin/slide');
	}


	

}