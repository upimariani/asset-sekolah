<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
	public function asset()
	{
		$this->db->select('*');
		$this->db->from('asets');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		$this->db->join('lokasi', 'lokasi.id_lokasi = asets.id_lokasi', 'left');
		$this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');
		return $this->db->get()->result();
	}


	public function laporan()
	{
		$data['aset'] = $this->db->query("SELECT * FROM `asets` JOIN barang ON asets.id_barang=barang.id_barang JOIN lokasi ON lokasi.id_lokasi=asets.id_lokasi")->result();
		$data['pengadaan'] = $this->db->query("SELECT * FROM `pengadaan` JOIN lokasi ON lokasi.id_lokasi=pengadaan.id_lokasi")->result();
		$data['monitoring'] = $this->db->query("SELECT * FROM `monitoring_aset` JOIN asets ON asets.id_aset=monitoring_aset.id_aset JOIN barang ON barang.id_barang=asets.id_barang")->result();
		$data['penghapusan'] = $this->db->query("SELECT * FROM `penghapusan` JOIN asets ON asets.id_aset=penghapusan.id_aset JOIN barang ON barang.id_barang=asets.id_barang JOIN lokasi ON lokasi.id_lokasi = asets.id_lokasi")->result();
		return $data;
	}
}

/* End of file mLaporan.php */
