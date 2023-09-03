<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        $this->load->model('DataModel'); // Load your DataModel
    }

	public function index()
{
    // Periksa apakah pengguna sudah masuk
    if (!$this->session->userdata('email')) {
        redirect('login');
    }

    // Dapatkan id admin yang masuk dari sesi
    $admin_id = $this->session->userdata('admin_id');

    $data['title'] = "Informasi";

    // Dapatkan informasi identitas admin
    $where = array('admin_id' => $admin_id);
    $data['pegawai'] = $this->db->get_where('pegawai', $where)->result();

   

    // Muat tampilan yang diperlukan
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('template_admin/topbar');
    $this->load->view('admin/pegawai_dinas', $data);
    $this->load->view('template_admin/footer');
}


	public function editPegawai($id)
	{
		
		$data['title'] = 'Edit Fasilitas';
		$where = array('id_pegawai' => $id);
		$data['pegawai'] = $this->db->get_where('pegawai', $where)->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/formEditPegawai', $data);
		$this->load->view('template_admin/footer');
	}

	public function aksiPegawai()
	{
		$id 		= $this->input->post('id_pegawai');
		$nama	= htmlspecialchars($this->input->post('nama', true));
		$jabatan		= htmlspecialchars($this->input->post('jabatan', true));
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
			'nama'  => $nama,
			'jabatan'		=> $jabatan,
		);
		
		$where = array(
			'id_pegawai' => $id
		);
		


		$this->DataModel->update_data('pegawai', $data, $where);
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!..
              </div>');
		redirect('admin/pegawai_dinas');
	}
	public function lihat_bidang()
    {
        $data['pegawai'] = $this->db->get('pegawai')->result();
        $this->load->view('admin/lihat_bidang', $data);
    }

	public function tambah_pegawai() {
        // Check if user is logged in as admin (admin_id validation)
        if (!$this->session->userdata('admin_id')) {
            // Redirect to login or show an error message
            redirect('admin/login'); // You should replace 'admin/login' with your actual login route
        }
		
		

        if ($this->input->post()) {
            // Handle form submission
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'gambar' => 'gambar', // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('fasilitas', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/identitas'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_pegawai');
        }
    }


}