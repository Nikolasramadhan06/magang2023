<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper('url'); 
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model('DataModel'); 
		$this->load->model('Kegiatan_model');// Load your DataModel
    }

	public function index()
	{
		// Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        // Get the logged-in admin's id from session
        $admin_id = $this->session->userdata('admin_id');
		//echo $admin_id;exit;
		$data['title'] = "Informasi";
		$where = array('admin_id' => $admin_id);
		$data['kegiatan'] = $this->db->get_where('kegiatan', $where)->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/kegiatan', $data);
		$this->load->view('template_admin/footer');

	}
	
	public function edit($id)
	{
		$data['title'] = "Edit Kegiatan";
		$where = array('id_kegiatan' => $id);
	
		$data['kegiatan'] = $this->db->get_where('kegiatan', $where)->row_array();
	
		if ($this->input->post('submit')) {
			// Proses penyimpanan data yang diedit ke dalam tabel kegiatan
			$updated_data = array(
				// Isi dengan field-field yang akan di-update dan nilainya
				'nama_field' => $this->input->post('input_nama_field'),
				'deskripsi_field' => $this->input->post('input_deskripsi_field')
				// Tambahkan field-field lain sesuai kebutuhan
			);
	
			$this->db->where('id_kegiatan', $id);
			$this->db->update('kegiatan', $updated_data);
	
			// Set flashdata untuk memberi pesan sukses
			$this->session->set_flashdata('message', 'Data kegiatan berhasil diupdate.');
			
			// Redirect ke halaman daftar kegiatan atau halaman lain yang diinginkan
			redirect('admin/daftar-kegiatan');
		} else {
			// Tampilkan halaman edit dengan data yang telah diambil dari database
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/topbar');
			$this->load->view('admin/edit-kegiatan', $data);
			$this->load->view('template_admin/footer');
		}
	}

	public function edit_aksi()
	{
		$id 		= $this->input->post('id_kegiatan');
		$judul	= htmlspecialchars($this->input->post('judul', true));
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
			'judul'  => $judul,
			'isi'	=> $isi,
		);

		$where = array(
			'id_kegiatan' => $id
		);

		$this->DataModel->update_data('kegiatan', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!.
              </div>');
		redirect('admin/kegiatan');
	}


	public function tambah_data() {
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
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'gambar' => $photo, // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('kegiatan', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/kegiatan'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_data');
        }
    }

	public function lihat_kegiatan($id_kegiatan) {
		$query = $this->db->get_where('kegiatan', array('id_kegiatan' => $id_kegiatan));
	
		if ($query->num_rows() > 0) {
			$data['kegiatan'] = $query->row_array();
	
			$this->load->view('admin/lihat_kegiatan', $data);
		} else {
			echo "Kegiatan tidak ditemukan.";
		}
	}

	public function hapusKegiatan($id_kegiatan)
{
    // Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
    $id_kegiatan = $this->db->escape_str($id_kegiatan);

    // SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
    $this->db->where('id_kegiatan', $id_kegiatan);
    $this->db->delete('kegiatan');

    // Redirect atau lakukan aksi lain setelah penghapusan
    redirect('admin/kegiatan');
}


	
	
}