<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index($usr = "diskominfo")
	{
		
		$this->db->select('id');
		$usr_id = $this->db->get_where('user',array('name'=>$usr))->result_array();
		$uId = $usr_id[0]['id'];
		$data['title'] = '';
		$data['slide'] = $this->db->get_where('slide',array('user_id'=>$uId))->result();
		$data['identitas'] = $this->db->get_where('identitas',array('user_id'=>$uId))->result();
		$data['about'] = $this->db->get_where('about',array('user_id'=>$uId))->result();
		$data['kegiatan'] = $this->db->get_where('kegiatan',array('user_id'=>$uId))->result();
		$data['fasilitas'] = $this->db->get_where('fasilitas',array('user_id'=>$uId))->result();
		$data['struktur'] = $this->db->get_where('struktur',array('user_id'=>$uId))->result();
		$data['pegawai'] = $this->db->get_where('pegawai',array('user_id'=>$uId))->result();

		$this->load->view('dashboard', $data);
	}

	public function message()
	{
		$nama = htmlspecialchars($this->input->post('nama'));
		$email = htmlspecialchars($this->input->post('email'));
		$no_tlp = htmlspecialchars($this->input->post('no_telepon'));
		$pesan = htmlspecialchars($this->input->post('pesan'));

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'no_telepon' => $no_tlp,
			'pesan' => $pesan
		);

		$this->db->insert('message', $data);
		redirect('user');
	}

}