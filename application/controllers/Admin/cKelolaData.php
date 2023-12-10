<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKelolaData');
	}


	//kategori
	public function kategori()
	{
		$data = array(
			'kategori' => $this->mKelolaData->select_kategori()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/kategori/vkategori', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createkategori()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama'),
			'kode_kategori' => $this->input->post('kode')
		);
		$this->mKelolaData->insert_kategori($data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
		redirect('Admin/cKelolaData/kategori');
	}
	public function updatekategori($id)
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama'),
			'kode_kategori' => $this->input->post('kode')
		);
		$this->mKelolaData->updatekategori($id, $data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Update!');
		redirect('Admin/cKelolaData/kategori');
	}
	public function deletekategori($id)
	{
		$this->mKelolaData->deletekategori($id);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
		redirect('Admin/cKelolaData/kategori');
	}
	//barang
	public function barang()
	{
		$data = array(
			'kategori' => $this->mKelolaData->select_kategori(),
			'barang' => $this->mKelolaData->select_barang()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/barang/vbarang', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createbarang()
	{
		$config['upload_path']          = './asset/foto-barang';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'kategori' => $this->mKelolaData->select_kategori(),
				'barang' => $this->mKelolaData->select_barang()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/barang/vbarang', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'merek' => $this->input->post('merek'),
				'tahun_perolehan' => $this->input->post('thn'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'picture' => $upload_data['file_name']
			);
			$this->mKelolaData->insert_barang($data);
			$this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan!');
			redirect('Admin/cKelolaData/barang');
		}
	}
	public function updatebarang($id)
	{
		$config['upload_path']          = './asset/foto-barang';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'kategori' => $this->mKelolaData->select_kategori(),
				'barang' => $this->mKelolaData->select_barang()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/barang/vbarang', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'merek' => $this->input->post('merek'),
				'tahun_perolehan' => $this->input->post('thn'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'picture' => $upload_data['file_name']
			);
			$this->mKelolaData->updatebarang($id, $data);
			$this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
			redirect('Admin/cKelolaData/barang');
		} //tanpa ganti gambar
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'nama_barang' => $this->input->post('nama'),
			'merek' => $this->input->post('merek'),
			'tahun_perolehan' => $this->input->post('thn'),
			'spesifikasi' => $this->input->post('spesifikasi')
		);
		$this->mKelolaData->updatebarang($id, $data);
		$this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
		redirect('Admin/cKelolaData/barang');
	}
	public function deletebarang($id)
	{
		$this->mKelolaData->deletebarang($id);
		$this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus!');
		redirect('Admin/cKelolaData/barang');
	}

	//lokasi
	public function lokasi()
	{
		$data = array(
			'lokasi' => $this->mKelolaData->select_lokasi()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/lokasi/vlokasi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createlokasi()
	{
		$data = array(
			'nama_lokasi' => $this->input->post('nama')
		);
		$this->mKelolaData->insert_lokasi($data);
		$this->session->set_flashdata('success', 'Data Lokasi Berhasil Disimpan!');
		redirect('Admin/cKelolaData/lokasi');
	}
	public function updatelokasi($id)
	{
		$data = array(
			'nama_lokasi' => $this->input->post('nama')
		);
		$this->mKelolaData->updatelokasi($id, $data);
		$this->session->set_flashdata('success', 'Data Lokasi Berhasil Diperbaharui!');
		redirect('Admin/cKelolaData/lokasi');
	}
	public function deletelokasi($id)
	{
		$this->mKelolaData->deletelokasi($id);
		$this->session->set_flashdata('success', 'Data Lokasi Berhasil Dihapus!');
		redirect('Admin/cKelolaData/lokasi');
	}


	//user
	public function user()
	{
		$data = array(
			'user' => $this->mKelolaData->select_user()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/user/vuser', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createuser()
	{
		$config['upload_path']          = './asset/foto-user';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'user' => $this->mKelolaData->select_user()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/user/vuser', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('level'),
				'foto' => $upload_data['file_name']
			);
			$this->mKelolaData->insert_user($data);
			$this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
			redirect('Admin/cKelolaData/user');
		}
	}
	public function updateuser($id)
	{
		$config['upload_path']          = './asset/foto-user';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'user' => $this->mKelolaData->select_user()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/user/vuser', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('level'),
				'foto' => $upload_data['file_name']
			);
			$this->mKelolaData->updateuser($id, $data);
			$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
			redirect('Admin/cKelolaData/user');
		} //tanpa ganti gambar
		$data = array(
			'jabatan' => $this->input->post('jabatan'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('level'),
		);
		$this->mKelolaData->updateuser($id, $data);
		$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
		redirect('Admin/cKelolaData/user');
	}
	public function deleteuser($id)
	{
		$this->mKelolaData->delete($id);
		$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
		redirect('Admin/cKelolaData/user');
	}

	//tipe harga
	public function tipe_harta()
	{
		$data = array(
			'tipe_harta' => $this->mKelolaData->select_tipe_harta()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/TipeHarta/vTipeHarta', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createtipeharta()
	{
		$data = array(
			'kelompok' => $this->input->post('kelompok'),
			'umur_ekonomis' => $this->input->post('umur'),
			'nilai_residu' => $this->input->post('nilai')
		);
		$this->mKelolaData->insert_tipe_harta($data);
		$this->session->set_flashdata('success', 'Tipe Harta berhasil disimpan!');
		redirect('Admin/cKelolaData/tipe_harta');
	}
	public function updatetipeharta($id)
	{
		$data = array(
			'kelompok' => $this->input->post('kelompok'),
			'umur_ekonomis' => $this->input->post('umur'),
			'nilai_residu' => $this->input->post('nilai')
		);
		$this->mKelolaData->updatetipe_harta($id, $data);
		$this->session->set_flashdata('success', 'Tipe Harta berhasil diperbaharui!');
		redirect('Admin/cKelolaData/tipe_harta');
	}
}

/* End of file cKelolaData.php */
