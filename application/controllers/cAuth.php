<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAuth');
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vAuth');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$auth = $this->mAuth->Auth($username, $password);
			if ($auth) {

				$array = array(
					'id' => $auth->id_user
				);

				$this->session->set_userdata($array);

				if ($auth->role == '1') {
					redirect('Admin/cDashboard');
				} else {
					redirect('KepalaSekolah/cDashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Salah!!!');
				redirect('cAuth');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');

		redirect('cAuth');
	}
}

/* End of file c.php */
