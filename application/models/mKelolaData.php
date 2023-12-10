<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaData extends CI_Model
{
	//kategori
	public function select_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori_barang');
		return $this->db->get()->result();
	}
	public function insert_kategori($data)
	{
		$this->db->insert('kategori_barang', $data);
	}
	public function updatekategori($id, $data)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori_barang', $data);
	}
	public function deletekategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori_barang');
	}

	//barang
	public function select_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori', 'left');
		return $this->db->get()->result();
	}
	public function insert_barang($data)
	{
		$this->db->insert('barang', $data);
	}
	public function updatebarang($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	public function deletebarang($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
	}

	//lokasi
	public function select_lokasi()
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		return $this->db->get()->result();
	}
	public function insert_lokasi($data)
	{
		$this->db->insert('lokasi', $data);
	}
	public function updatelokasi($id, $data)
	{
		$this->db->where('id_lokasi', $id);
		$this->db->update('lokasi', $data);
	}
	public function deletelokasi($id)
	{
		$this->db->where('id_lokasi', $id);
		$this->db->delete('lokasi');
	}

	//user
	public function select_user()
	{
		$this->db->select('*');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	public function insert_user($data)
	{
		$this->db->insert('user', $data);
	}
	public function updateuser($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	//tipe harta
	public function select_tipe_harta()
	{
		$this->db->select('*');
		$this->db->from('tipe_harta');
		return $this->db->get()->result();
	}
	public function insert_tipe_harta($data)
	{
		$this->db->insert('tipe_harta', $data);
	}
	public function updatetipe_harta($id, $data)
	{
		$this->db->where('id_tipe_harta', $id);
		$this->db->update('tipe_harta', $data);
	}
	public function delete_tipe_harta($id)
	{
		$this->db->where('id_tipe_harta', $id);
		$this->db->delete('tipe_harta');
	}
}

/* End of file mKelolaData.php */
