<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPeminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPeminjaman');
		$this->load->model('mAsset');
	}

	public function index()
	{
		$data = array(
			'peminjaman' => $this->mPeminjaman->select(),
			'asets' => $this->mAsset->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Peminjaman/vPeminjaman', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_aset' => $this->input->post('aset'),
			'nama_peminjam' => $this->input->post('nama'),
			'tgl_peminjaman' => $this->input->post('tgl_pinjam'),
			'status' => '0'
		);
		$this->mPeminjaman->insert($data);
		$this->session->set_flashdata('success', 'Data Peminjaman Aset Berhasil Disimpan!');
		redirect('Admin/cPeminjaman');
	}
	public function update($id)
	{
		$data = array(
			'id_aset' => $this->input->post('aset'),
			'nama_peminjam' => $this->input->post('nama'),
			'tgl_peminjaman' => $this->input->post('tgl_pinjam'),
			'status' => '0'
		);
		$this->mPeminjaman->update($id, $data);
		$this->session->set_flashdata('success', 'Data Peminjaman Aset Berhasil Diperbaharui!');
		redirect('Admin/cPeminjaman');
	}
	public function dikembalikan($id)
	{
		$data = array(
			'tgl_pengembalian' => $this->input->post('tgl_kembali'),
			'status' => '1'
		);
		$this->mPeminjaman->update($id, $data);
		$this->session->set_flashdata('success', 'Data Peminjaman Aset Berhasil Diperbaharui!');
		redirect('Admin/cPeminjaman');
	}
	public function delete($id)
	{
		$this->mPeminjaman->delete($id);
		$this->session->set_flashdata('success', 'Data Peminjaman Aset Berhasil Dihapus!');
		redirect('Admin/cPeminjaman');
	}
}

/* End of file cPeminjaman.php */
