<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeputusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengajuan');
	}
	public function index()
	{
		$data = array(
			'pengajuan' => $this->mPengajuan->select(),
			'detail' => $this->mPengajuan->info_keputusan()
		);
		$this->load->view('KepalaSekolah/Layout/head');
		$this->load->view('KepalaSekolah/Layout/aside');
		$this->load->view('KepalaSekolah/vKeputusan', $data);
		$this->load->view('KepalaSekolah/Layout/footer');
	}
	public function keputusan($id)
	{
		$acc = $this->input->post('acc');
		$data = array(
			'status' => $acc
		);
		$this->mPengajuan->keputusan($id, $data);
		$this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
		redirect('KepalaSekolah/cKeputusan');
	}

	public function delete($id)
	{
		$this->db->where('id_pengadaan', $id);
		$this->db->delete('pengadaan');
		$this->session->set_flashdata('success', 'Anda telah berhasil menghapus asset keputusan!');
		redirect('KepalaSekolah/cKeputusan');
	}
}

/* End of file cKeputusan.php */
