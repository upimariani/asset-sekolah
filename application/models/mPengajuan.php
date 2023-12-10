<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengajuan extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('pengadaan', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->join('lokasi', 'pengadaan.id_lokasi = lokasi.id_lokasi', 'left');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->join('monitoring_aset', 'pengadaan.id_monitoring = monitoring_aset.id_monitoring', 'left');
		$this->db->join('asset', 'asset.id_asset = monitoring_aset.id_asset', 'left');
		$this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
		$this->db->join('user', 'user.id_user = pengadaan.id_user', 'left');
		$this->db->where('id_pengadaan', $id);
		return $this->db->get()->row();
	}

	public function update($id, $data)
	{
		$this->db->where('id_pengadaan', $id);
		$this->db->update('pengadaan', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_pengadaan', $id);
		$this->db->delete('pengadaan');
	}

	// keputusan kepala desa
	public function keputusan($id, $data)
	{
		$this->db->where('id_pengadaan', $id);
		$this->db->update('pengadaan', $data);
	}
	public function asset_kep($data)
	{
		$this->db->insert('asset_kep', $data);
	}
	public function info_keputusan()
	{
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->join('lokasi', 'pengadaan.id_lokasi = lokasi.id_lokasi', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mpengadaan.php */
