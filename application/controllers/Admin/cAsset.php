<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAsset extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAsset');
		$this->load->model('mKelolaData');
	}

	public function index()
	{
		$data = array(
			'asset' => $this->mAsset->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/asset/vasset', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('kode', 'Kode Asset', 'required');
		$this->form_validation->set_rules('barang', 'Barang', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Asset', 'required');
		$this->form_validation->set_rules('volume', 'Volume Asset', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Asset', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan Asset', 'required');
		$this->form_validation->set_rules('harga', 'Harga Asset', 'required');
		$this->form_validation->set_rules('kondisi', 'Kondisi Asset', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'lokasi' => $this->mKelolaData->select_lokasi(),
				'barang' => $this->mKelolaData->select_barang(),
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/asset/vCreateAsset', $data);
			$this->load->view('Admin/Layout/footer');
		} else {


			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$kode_asset = $this->input->post('kode');
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './asset/'; //string, the default is application/cache/
			$config['errorlog']     = './asset/'; //string, the default is application/logs/
			$config['imagedir']     = './asset/images/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$image_name = $kode_asset . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kode_asset; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


			$data = array(
				'id_lokasi' => $this->input->post('lokasi'),
				'id_barang' => $this->input->post('barang'),
				'kode_barang' => $this->input->post('kode'),
				'volume' => $this->input->post('volume'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'kondisi' => $this->input->post('kondisi'),
				'jenis_aset' => $this->input->post('jenis'),
				'qr_code' => $this->input->post('kode'),
			);
			$this->mAsset->insert($data);
			$this->session->set_flashdata('success', 'Data Aset Berhasil Ditambahkan!');
			redirect('Admin/cAsset');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('kode', 'Kode Asset', 'required');
		$this->form_validation->set_rules('barang', 'Barang', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Asset', 'required');
		$this->form_validation->set_rules('volume', 'Volume Asset', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Asset', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan Asset', 'required');
		$this->form_validation->set_rules('harga', 'Harga Asset', 'required');
		$this->form_validation->set_rules('kondisi', 'Kondisi Asset', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'lokasi' => $this->mKelolaData->select_lokasi(),
				'barang' => $this->mKelolaData->select_barang(),
				'asset' => $this->mAsset->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/asset/vUpdateAsset', $data);
			$this->load->view('Admin/Layout/footer');
		} else {


			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$kode_asset = $this->input->post('kode');
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './asset/'; //string, the default is application/cache/
			$config['errorlog']     = './asset/'; //string, the default is application/logs/
			$config['imagedir']     = './asset/images/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$image_name = $kode_asset . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kode_asset; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


			$data = array(
				'id_lokasi' => $this->input->post('lokasi'),
				'id_barang' => $this->input->post('barang'),
				'kode_barang' => $this->input->post('kode'),
				'volume' => $this->input->post('volume'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'kondisi' => $this->input->post('kondisi'),
				'jenis_aset' => $this->input->post('jenis'),
				'qr_code' => $this->input->post('kode'),
			);
			$this->mAsset->update($id, $data);
			$this->session->set_flashdata('success', 'Data Aset Berhasil Diperbaharui!');
			redirect('Admin/cAsset');
		}
	}
	public function delete($id)
	{
		$asset = $this->mAsset->edit($id);

		$path = './asset/images/' . $asset->qr_code . '.png';
		unlink($path);
		$this->mAsset->delete($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
		redirect('Admin/cAsset');
	}
}

/* End of file cAsset.php */
