<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper('url'); 
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model('DataModel'); 
		$this->load->model('Kegiatan_model'); // Load your DataModel
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
    $this->load->view('admin/bidang', $data);
    $this->load->view('template_admin/footer');


    
}


public function edit($id)
{
    $data['title'] = "Edit Bidang";
    $where = array('id_pegawai' => $id);

    $data['pegawai'] = $this->db->get_where('pegawai', $where)->row_array();

    if ($this->input->post('submit')) {
        // Proses penyimpanan data yang diedit ke dalam tabel kegiatan
        $updated_data = array(
            // Isi dengan field-field yang akan di-update dan nilainya
            'nama_field' => $this->input->post('input_nama_field'),
            'deskripsi_field' => $this->input->post('input_deskripsi_field')
            // Tambahkan field-field lain sesuai kebutuhan
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $updated_data);

        // Set flashdata untuk memberi pesan sukses
        $this->session->set_flashdata('message', 'Data kegiatan berhasil diupdate.');
        
        // Redirect ke halaman daftar kegiatan atau halaman lain yang diinginkan
        redirect('admin/pegawai');
    } else {
        // Tampilkan halaman edit dengan data yang telah diambil dari database
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/topbar');
        $this->load->view('admin/formEditBidang', $data);
        $this->load->view('template_admin/footer');
    }
}

public function aksiBidang()
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
        'gambar' => $photo,
        'nama'  => $nama,
        'jabatan'	=> $jabatan,
    );

    $where = array(
        'id_pegawai' => $id
    );

    $this->DataModel->update_data('pegawai', $data, $where);
    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Data berhasil diperbaharui!.
          </div>');
    redirect('admin/bidang');
}

	public function lihat_bidang($user_id) {
        $this->load->database();
        
        $data['pegawai'] = $this->db->get_where('pegawai', array('user_id' => $user_id))->result();
        $this->load->view('admin/lihat_bidang', $data);
    }
    

	public function tambah_bidang() {
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
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'gambar' => $photo, // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('pegawai', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/bidang'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_bidang');
        }
    }

  

    public function hapusbidang($id_pegawai)
{
    // Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
    $id_pegawai = $this->db->escape_str($id_pegawai);

    // SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->delete('pegawai');

    // Redirect atau lakukan aksi lain setelah penghapusan
    redirect('admin/bidang');
}


}