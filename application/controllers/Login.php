<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email tidak boleh kosong!']);
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('DataModel'); // Load the DataModel
            $cek = $this->DataModel->cekLogin($email, $password);

            if ($cek == FALSE) {
                
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    Cek password dan email Anda!.
                </div>');
                redirect('login');
            } else {
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('admin_id', $cek->id);
                redirect('admin/dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('login');
    }
}
