<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {

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
		$data['title'] = "Struktur";
		$where = array('admin_id' => $admin_id);
		$data['struktur'] = $this->db->get_where('struktur', $where)->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/struktur', $data);
		$this->load->view('template_admin/footer');

	}
	
	public function edit($id)
	{
		$data['title'] = "Edit Struktur";
		$where = array('id_gambar' => $id);
	
		$data['struktur'] = $this->db->get_where('struktur', $where)->row_array();
	
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
			redirect('admin/struktur');
		} else {
			// Tampilkan halaman edit dengan data yang telah diambil dari database
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/topbar');
			$this->load->view('admin/Edit_struktur', $data);
			$this->load->view('template_admin/footer');
		}
	}

	public function aksiStruktur()
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
		


		$this->DataModel->update_data('struktur', $data, $where);
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!..
              </div>');
		redirect('admin/struktur');
	}



    public function tambah_struktur() {
        // Check if user is logged in as admin (admin_id validation)
        if (!$this->session->userdata('admin_id')) {
            // Redirect to login or show an error message
            redirect('admin/login'); // You should replace 'admin/login' with your actual login route
        }
		
		

        if ($this->input->post()) {
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
            // Handle form submission
            $data = array(
                'gambar' => $photo, // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('struktur', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/struktur'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_struktur');
        }
    }

    public function hapusstruktur($id_gambar)
	{
		// Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
		$id_gambar = $this->db->escape_str($id_gambar);
	
		// SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
		$this->db->where('id_gambar', $id_gambar);
		$this->db->delete('struktur');
	
		// Redirect atau lakukan aksi lain setelah penghapusan
		redirect('admin/struktur');
	}

	

}