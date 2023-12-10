<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPenyusutan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('asets');
		$this->db->join('tipe_harta', 'asets.id_tipe_harta = tipe_harta.id_tipe_harta', 'left');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		$this->db->where('asets.id_tipe_harta!=0');
		return $this->db->get()->result();
	}
	public function insert($id, $data)
	{
		$this->db->where('id_aset', $id);
		$this->db->update('asets', $data);
	}
	public function detail_penyusutan($id)
	{
		$data['asset'] = $this->db->query("SELECT * FROM asets JOIN barang ON asets.id_barang=barang.id_barang JOIN tipe_harta ON tipe_harta.id_tipe_harta=asets.id_tipe_harta WHERE id_aset='" . $id . "'")->row();
		$data['penyusutan'] = $this->db->query("SELECT * FROM asets JOIN tipe_harta ON tipe_harta.id_tipe_harta=asets.id_tipe_harta WHERE id_aset='" . $id . "'")->result();
		return $data;
	}
}


/* End of file mPenyusutan.php */
