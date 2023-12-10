<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPenyusutan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAsset');
		$this->load->model('mPenyusutan');
		$this->load->model('mKelolaData');
	}
	public function index()
	{
		$data = array(
			'asset' => $this->mAsset->select(),
			'tipe_harta' => $this->mKelolaData->select_tipe_harta(),
			'asset_penyusutan' => $this->mPenyusutan->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Penyusutan/vpenyusutan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail($id)
	{
		$data = array(
			'detail' => $this->mPenyusutan->detail_penyusutan($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Penyusutan/vDetailPenyusutan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$id_asset = $this->input->post('asset');
		$data = array(
			'id_tipe_harta' => $this->input->post('harta')
		);
		$this->mPenyusutan->insert($id_asset, $data);
		$this->session->set_flashdata('success', 'Data Penyusutan Harga Asset Berhasil Disimpan!!');
		redirect('Admin/cPenyusutan');
	}
}

/* End of file cPenyusutan.php */
