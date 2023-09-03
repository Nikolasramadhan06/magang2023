<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('DataModel');
        // Load necessary models and libraries
        $this->load->model('ModelSecurity');
        $this->load->library('session');
        //url security
        $this->ModelSecurity->getSecurity();
    }

    public function index($adm = "diskominfo")
    {
        // Check if the user is logged in
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $admin_id = $this->session->userdata('admin_id');

        $data['title'] = 'Dashboard Admin';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/topbar');
        $this->load->view('admin/dashboard');
        $this->load->view('template_admin/footer');
    
        $this->db->select('id');
        $adm_id = $this->db->get_where('admin', array('username' => $adm))->result_array();

        $uId = $adm_id[0]['id'];
        // Additional processing based on $uId
        // ...

    }
}
