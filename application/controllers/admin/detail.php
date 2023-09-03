<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

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
		//echo $admin_id;exit;
		$data['title'] = "Detail";
		$where = array('admin_id' => $admin_id);
		$data['kegiatan'] = $this->db->get_where('kegiatan', $where)->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/kegiatan', $data);
		$this->load->view('template_admin/footer');

	}

	public function detail($id_kegiatan) {
        // Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        // Get the logged-in admin's id from session
        $admin_id = $this->session->userdata('admin_id');
		//echo $admin_id;exit;
		$data['title'] = "Detail";
		$where = array('admin_id' => $admin_id);
		$data['kegiatan'] = $this->db->get_where('kegiatan', $where)->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/kegiatan', $data);
		$this->load->view('template_admin/footer');
    }
    


}