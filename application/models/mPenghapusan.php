<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPenghapusan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('penghapusan');
		$this->db->join('asets', 'penghapusan.id_aset = asets.id_aset', 'left');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');

		return $this->db->get()->result();
	}
}

/* End of file mPenghapusan.php */
