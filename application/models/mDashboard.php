<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	public function total()
	{
		$data['monitoring'] = $this->db->query("SELECT COUNT(id_monitoring) as jml_monitoring FROM `monitoring_aset`;")->row();
		$data['pengajuan'] = $this->db->query("SELECT COUNT(id_pengadaan) as jml_pengajuan FROM `pengadaan` WHERE status='2';")->row();
		$data['asset'] = $this->db->query("SELECT COUNT(id_aset) as jml_asset FROM `asets`;")->row();
		$data['user'] = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `user`;")->row();
		return $data;
	}
}

/* End of file mDashboard.php */
