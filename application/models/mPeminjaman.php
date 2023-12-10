<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPeminjaman extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('asets', 'peminjaman.id_aset = asets.id_aset', 'left');
		$this->db->join('barang', 'asets.id_barang = barang.id_barang', 'left');

		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('peminjaman', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_peminjam', $id);
		$this->db->update('peminjaman', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_peminjam', $id);
		$this->db->delete('peminjaman');
	}
}

/* End of file mPeminjaman.php */
