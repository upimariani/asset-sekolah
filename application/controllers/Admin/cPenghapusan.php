<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPenghapusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAsset');
		$this->load->model('mPenghapusan');
	}

	public function index()
	{
		$data = array(
			'asset' => $this->mAsset->select(),
			'penghapusan' => $this->mPenghapusan->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Penghapusan/vPenghapusan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_aset' => $this->input->post('aset'),
			'jumlah' => $this->input->post('jumlah'),
			'faktor' => $this->input->post('faktor'),
			'tgl_penghapusan' => date('Y-m-d')
		);
		$this->db->insert('penghapusan', $data);

		$id_aset =  $this->input->post('aset');
		$status_aset = array(
			'status_aset' => '1'
		);
		$this->db->where('id_aset', $id_aset);
		$this->db->update('asets', $status_aset);



		$this->session->set_flashdata('success', 'Data Penghapusan Berhasil Disimpan!');
		redirect('Admin/cPenghapusan');
	}
	public function update($id_penghapusan, $id_aset)
	{
		$id_aset_new = $this->input->post('aset');
		if ($id_aset_new != $id_aset) {
			$status_aset = array(
				'status_aset' => '1'
			);
			$this->db->where('id_aset', $id_aset_new);
			$this->db->update('asets', $status_aset);

			$back_status = array(
				'status_aset' => '0'
			);
			$this->db->where('id_aset', $id_aset);
			$this->db->update('asets', $back_status);
		}

		$data = array(
			'id_aset' => $this->input->post('aset'),
			'jumlah' => $this->input->post('jumlah'),
			'faktor' => $this->input->post('faktor'),
			'tgl_penghapusan' => date('Y-m-d')
		);
		$this->db->where('id_penghapusan', $id_penghapusan);
		$this->db->update('penghapusan', $data);
		$this->session->set_flashdata('success', 'Data Penghapusan Berhasil Diperbaharui!');
		redirect('Admin/cPenghapusan');
	}
}

/* End of file cPenghapusan.php */
