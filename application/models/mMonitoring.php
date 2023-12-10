<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mMonitoring extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('monitoring_aset', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('monitoring_aset');
		$this->db->join('asets', 'monitoring_aset.id_aset = asets.id_aset', 'left');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('monitoring_aset');
		$this->db->join('asets', 'monitoring_aset.id_aset = asets.id_aset', 'left');
		$this->db->join('barang', 'barang.id_barang = asets.id_barang', 'left');
		$this->db->where('monitoring_aset.id_monitoring', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_monitoring', $id);
		$this->db->update('monitoring_aset', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_monitoring', $id);
		$this->db->delete('monitoring_aset');
	}
}

/* End of file mMonitoring.php */
