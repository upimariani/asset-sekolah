<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAsset extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('asets', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('asets');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		$this->db->join('lokasi', 'lokasi.id_lokasi = asets.id_lokasi', 'left');
		$this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('asets');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		$this->db->join('lokasi', 'lokasi.id_lokasi = asets.id_lokasi', 'left');
		$this->db->where('id_aset', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_aset', $id);
		$this->db->update('asets', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_aset', $id);
		$this->db->delete('asets');
	}
}

/* End of file mAsset.php */
