<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

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
    $data['identitas'] = $this->db->get_where('identitas', $where)->result();

    // Dapatkan informasi about
    $data['about'] = $this->db->get_where('about', $where)->result();

    // Dapatkan informasi fasilitas
    $data['fasilitas'] = $this->db->get_where('fasilitas', $where)->result();

    // Muat tampilan yang diperlukan
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('template_admin/topbar');
    $this->load->view('admin/identitas', $data);
    $this->load->view('template_admin/footer');
}


	public function editIdentitas($id)
	{
		$data['title'] = 'Edit Halaman Admin';
		$where = array('id' => $id);

		$data['identitas'] = $this->db->get_where('identitas', $where)->result();

		if ($this->input->post('submit')) {
			// Proses penyimpanan data yang diedit ke dalam tabel kegiatan
			$updated_data = array(
				// Isi dengan field-field yang akan di-update dan nilainya
				'nama_field' => $this->input->post('input_nama_field'),
				'deskripsi_field' => $this->input->post('input_deskripsi_field')
				// Tambahkan field-field lain sesuai kebutuhan
			);
	
			$this->db->where('id', $id);
			$this->db->update('about', $updated_data);
	
			// Set flashdata untuk memberi pesan sukses
			$this->session->set_flashdata('message', 'Data kegiatan berhasil diupdate.');
			
			// Redirect ke halaman daftar kegiatan atau halaman lain yang diinginkan
			redirect('admin/daftar-kegiatan');
		} else {
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/formEditIdentitas', $data);
		$this->load->view('template_admin/footer');
		}
	}

	public function aksiIdentitas()
	{
		$id 		= $this->input->post('id');
		$judulweb	= htmlspecialchars($this->input->post('judul_website', true));
		$alamat		= htmlspecialchars($this->input->post('alamat', true));
		$provinsi	= htmlspecialchars($this->input->post('provinsi', true));
		$email		= htmlspecialchars($this->input->post('email', true));
		$notlp		= htmlspecialchars($this->input->post('no_telepon', true));

		$data = array(
			'judul_website'  => $judulweb,
			'alamat'	=> $alamat,
			'provinsi'	=> $provinsi,
			'email'		=> $email,
			'no_telepon'=> $notlp
		);

		$where = array(
			'id' => $id
		);

		$this->DataModel->update_data('identitas', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Identitas berhasil diperbaharui!.
              </div>');
		redirect('admin/identitas');
	}

	public function tambah_identitas() {
        // Check if user is logged in as admin (admin_id validation)
        if (!$this->session->userdata('admin_id')) {
            // Redirect to login or show an error message
            redirect('admin/login'); // You should replace 'admin/login' with your actual login route
        }
		
		

        if ($this->input->post()) {
            // Handle form submission
            $data = array(
                'judul_website' => $this->input->post('judul_website'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
				'no_telepon' => $this->input->post('no_telepon'),
				'email' => $this->input->post('email'), // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('identitas', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/identitas'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_identitas');
        }
    }

	public function hapusidentitas($id)
{
    // Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
    $id = $this->db->escape_str($id);

    // SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
    $this->db->where('id', $id);
    $this->db->delete('identitas');

    // Redirect atau lakukan aksi lain setelah penghapusan
    redirect('admin/identitas');
}


	public function editTentang($id)
	{
		$data['title'] = 'Edit Tentang Lembaga';
		$where = array('id' => $id);
		$data['about'] = $this->db->get_where('about')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/formEditTentang', $data);
		$this->load->view('template_admin/footer');
	}

	public function aksiTentang()
	{
		$id 		= $this->input->post('id');
		$about_us	= htmlspecialchars($this->input->post('about_us', true));
		$visi		= htmlspecialchars($this->input->post('visi', true));
		$misi		= htmlspecialchars($this->input->post('misi', true));

		$data = array(
			'about_us'  => $about_us,
			'visi'		=> $visi,
			'misi'		=> $misi
		);

		$where = array(
			'id' => $id
		);

		$this->DataModel->update_data('about', $data, $where);
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!..
              </div>');
		redirect('admin/identitas');
	}

	public function tambah_lembaga() {
        // Check if user is logged in as admin (admin_id validation)
        if (!$this->session->userdata('admin_id')) {
            // Redirect to login or show an error message
            redirect('admin/login'); // You should replace 'admin/login' with your actual login route
        }
		
		

        if ($this->input->post()) {
            // Handle form submission
            $data = array(
                'about_us' => $this->input->post('about_us'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'), // Replace with actual file upload logic
                'user_id' => $this->input->post('user_id'),
                'admin_id' => $this->input->post('admin_id')
            );

            // Insert data into the database table
            $this->db->insert('about', $data);

            // Redirect to a success page or back to the same page with a success message
            redirect('admin/identitas'); // You should replace 'admin/kegiatan' with your actual kegiatan route
        } else {
            // Load the view for adding data
            $this->load->view('admin/tambah_lembaga');
        }
    }

	public function hapuslembaga($id)
{
    // Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
    $id = $this->db->escape_str($id);

    // SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
    $this->db->where('id', $id);
    $this->db->delete('about');

    // Redirect atau lakukan aksi lain setelah penghapusan
    redirect('admin/identitas');
}

	public function editFasilitas($id)
	{
		
		$data['title'] = 'Edit Fasilitas';
		$where = array('id_fasilitas' => $id);
		$data['fasilitas'] = $this->db->get_where('fasilitas', $where)->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/formEditFasilitas', $data);
		$this->load->view('template_admin/footer');
	}

	public function aksiFasilitas()
	{
		$id 		= $this->input->post('id_fasilitas');
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
			'gambar'  => $photo,
			'judul'  => $judul,
			'isi'		=> $isi,
		);
		
		$where = array(
			'id_fasilitas' => $id
		);
		


		$this->DataModel->update_data('fasilitas', $data, $where);
		$this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!..
              </div>');
		redirect('admin/identitas');
	}

	public function hapusfasilitas($id_fasilitas)
	{
		// Pastikan $id_kegiatan bersifat aman dengan menggunakan fungsi escape
		$id_fasilitas = $this->db->escape_str($id_fasilitas);
	
		// SQL statement untuk menghapus data dari tabel "kegiatan" berdasarkan id_kegiatan
		$this->db->where('id_fasilitas', $id_fasilitas);
		$this->db->delete('fasilitas');
	
		// Redirect atau lakukan aksi lain setelah penghapusan
		redirect('admin/identitas');
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