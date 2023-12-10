<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengajuan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengajuan');
		$this->load->model('mMonitoring');
		$this->load->model('mKelolaData');
	}

	public function index()
	{
		$data = array(
			'pengajuan' => $this->mPengajuan->select(),
			// 'detail' => $this->mPengajuan->info_keputusan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/pengajuan/vpengajuan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('lokasi', 'Lokasi Pengadaan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Aset', 'required');
		$this->form_validation->set_rules('volume', 'Volume', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'lokasi' => $this->mKelolaData->select_lokasi()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/pengajuan/vcreatepengajuan', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_lokasi' => $this->input->post('lokasi'),
				'id_user' => '1',
				'nama_aset' => $this->input->post('nama'),
				'volume' => $this->input->post('volume'),
				'satuan' => $this->input->post('satuan'),
				'harga_satuan' => $this->input->post('harga'),
				'tahun_pengadaan' => $this->input->post('tahun'),
				'status' => '0'
			);
			$this->mPengajuan->insert($data);
			$this->session->set_flashdata('success', 'Data Pengadaan Aset Berhasil Diajukkan! Mohon menunggu konfirmasi dari Kepala Sekolah');
			redirect('Admin/cPengajuan');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('asset', 'Hasil Monitoring', 'required');
		$this->form_validation->set_rules('date', 'Hasil Monitoring', 'required');
		$this->form_validation->set_rules('jml', 'Hasil Monitoring', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'monitoring' => $this->mMonitoring->select(),
				'pengajuan' => $this->mPengajuan->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/pengajuan/vUpdatePengajuan', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_monitoring' => $this->input->post('asset'),
				'id_user' => $this->session->userdata('id'),
				'tgl_pengajuan' => $this->input->post('date'),
				'total_pengajuan' => $this->input->post('jml'),
				'status_pengajuan' => '0',
			);
			$this->mPengajuan->update($id, $data);
			$this->session->set_flashdata('success', 'Data Pengajuan Berhasil Diperbaharui!');
			redirect('Admin/cPengajuan');
		}
	}
	public function delete($id)
	{
		$this->mPengajuan->delete($id);
		$this->session->set_flashdata('success', 'Data Pengajuan Berhasil Dihapus!');
		redirect('Admin/cPengajuan');
	}
}

/* End of file cPengajuan.php */
