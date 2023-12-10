<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
		$this->load->model('mKelolaData');
	}


	public function index()
	{
		$data = array(
			'asset' => $this->mLaporan->asset()
		);
		$this->load->view('KepalaSekolah/Layout/head');
		$this->load->view('KepalaSekolah/Layout/aside');
		$this->load->view('KepalaSekolah/vLaporan', $data);
		$this->load->view('KepalaSekolah/Layout/footer');
	}
	public function laporan()
	{
		$kategori = $this->input->post('laporan');
		if ($kategori == '1') {
			redirect('KepalaSekolah/cLaporan/lap_aset');
		} else if ($kategori == '2') {
			redirect('KepalaSekolah/cLaporan/lap_pengadaan');
		} else if ($kategori == '3') {
			redirect('KepalaSekolah/cLaporan/lap_monitoring');
		} else if ($kategori == '4') {
			redirect('KepalaSekolah/cLaporan/lap_penghapusan');
		}
	}
	public function lap_aset()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 40);
		$pdf->Cell(200, 5, 'MTs Negeri 9 Kuningan', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jl. Raya Maleber No.1, Maleber, Kec. Maleber, Kabupaten Kuningan, Jawa Barat 45575', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN HASIL INVENTARISASI (LHI) ASSET SEKOLAH', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Jenis Aset', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Kode Barang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Merk/Type', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun Perolehan', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nilai Perolehan (Rp)', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$asset = $this->mLaporan->laporan();
		foreach ($asset['aset'] as $key => $value) {
			$tot += $value->harga;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->nama_barang, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->kode_barang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->merek, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->tahun_perolehan, 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp.' . number_format($value->harga), 1, 1, 'R');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(185, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');


		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Maleber, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Kepala Sekolah', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Wakasek SARPRAS', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(Dra. Lilis Roslina Emod, M.Pd.I)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(Sodikin, S.Pd.I.)', 0, 0, 'C');

		$pdf->Output();
	}
	public function lap_pengadaan()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 40);
		$pdf->Cell(200, 5, 'MTs Negeri 9 Kuningan', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jl. Raya Maleber No.1, Maleber, Kec. Maleber, Kabupaten Kuningan, Jawa Barat 45575', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN HASIL PENGADAAN ASSET SEKOLAH', 0, 1, 'C');



		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Nama Aset', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Volume', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Satuan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun Pengadaan', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nilai Perolehan (Rp)', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$asset = $this->mLaporan->laporan();
		foreach ($asset['pengadaan'] as $key => $value) {
			$tot += ($value->harga_satuan * $value->volume);
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->nama_aset, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->volume, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->satuan, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->tahun_pengadaan, 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp.' . number_format($value->harga_satuan), 1, 1, 'R');
		}


		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');


		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Maleber, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Kepala Sekolah', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Wakasek SARPRAS', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(Dra. Lilis Roslina Emod, M.Pd.I)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(Sodikin, S.Pd.I.)', 0, 0, 'C');

		$pdf->Output();
	}
	public function lap_monitoring()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 12);

		$pdf->Cell(200, 10, 'Berita Acara Monitoring Aset Sekolah', 0, 1, 'L');
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Nomor : ', 0, 1, 'L');
		$pdf->Cell(200, 10, 'Tanggal :' . date('d/m/Y'), 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(200, 10, 'LAPORAN HASIL MONITORING ASSET SEKOLAH', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Nama Aset', 1, 0, 'C');
		$pdf->Cell(140, 7, 'Hasil Monitoring', 1, 0, 'C');

		$pdf->Cell(30, 7, 'Jumlah Rusak', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Foto', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tanggal Monitoring', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$asset = $this->mLaporan->laporan();
		foreach ($asset['monitoring'] as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1);
			$pdf->Cell(35, 7, $value->nama_barang, 1);
			$pdf->Cell(140, 7, $value->kerusakan, 1);
			$pdf->Cell(30, 7, $value->jml_rusak, 1);
			$pdf->Cell(30, 7, $value->foto, 1);
			$pdf->Cell(30, 7, $value->tgl_input, 1);
			$pdf->Ln();
		}

		// $pdf->SetFont('Times', 'I', 9);
		// $pdf->Cell(40, 7, '', 0, 1, 'C');
		// $pdf->Cell(40, 7, '', 0, 1, 'C');
		// $pdf->Cell(150, 7, 'Wakasek SARPRAS', 0, 1, 'R');

		// $pdf->Cell(150, 7, 'Sodikin, S.Pd.I.', 0, 0, 'R');
		// $pdf->Cell(30, 7, '............................', 0, 1, 'R');

		$pdf->Output();
	}
	public function lap_penghapusan()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 40);
		$pdf->Cell(200, 5, 'MTs Negeri 9 Kuningan', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Jl. Raya Maleber No.1, Maleber, Kec. Maleber, Kabupaten Kuningan, Jawa Barat 45575', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'BERITA ACARA PENGHAPUSAN ASET', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(190, 10, 'Pada hari ini telah melaksanakan penghapusan aset berupa:', 0, 1, 'C');


		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Nama Aset', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Lokasi', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(65, 7, 'Faktor', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Tanggal Penghapusan', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$asset = $this->mLaporan->laporan();
		foreach ($asset['penghapusan'] as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->nama_barang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->nama_lokasi, 1, 0, 'C');
			$pdf->Cell(20, 7, $value->jumlah, 1, 0, 'C');
			$pdf->Cell(65, 7, $value->faktor, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->tgl_penghapusan, 1, 1, 'C');
		}

		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 15, 'Aset Tersebut telah diperiksa dan terdapat rusak / cacat produksi dan tidak memungkinkan untuk digunakan kembali', 0, 1, 'L');
		$pdf->Cell(200, 2, 'Demikian Berita Acara ini kami buat berdasarkan keadaan yang sebenarnya.', 0, 1, 'L');
		$pdf->Cell(200, 5, 'Atas perhatian dan kerjasamanya kami mengucapkan terima kasih', 0, 1, 'L');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');


		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Maleber, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Kepala Sekolah', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Wakasek SARPRAS', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(Dra. Lilis Roslina Emod, M.Pd.I)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(Sodikin, S.Pd.I.)', 0, 0, 'C');

		$pdf->Output();
	}
	public function cetak_laporan()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 12);

		$pdf->Cell(200, 10, 'Berita Acara Inventarisasi Asset Desa', 0, 1, 'L');
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Nomor : ', 0, 1, 'L');
		$pdf->Cell(200, 10, 'Tanggal :' . date('d/m/Y'), 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(200, 10, 'LAPORAN HASIL INVENTARISASI (LHI) ASSET DESA', 0, 1, 'C');




		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Jenis Barang', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Kode Barang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Merk/Type', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun Perolehan', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nilai Perolehan (Rp)', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$kategori = $this->input->post('kategori');
		$asset = $this->mLaporan->asset_kategori($kategori);
		foreach ($asset as $key => $value) {
			$tot += $value->harga_asset;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->nama_barang, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->kode_asset, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->merk, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->tgl_peroleh, 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp.' . number_format($value->harga_asset), 1, 1, 'R');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(185, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', 'I', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(150, 7, 'Tim Inventarisasi', 0, 1, 'R');

		$pdf->Cell(150, 7, '1. Muniah', 0, 0, 'R');
		$pdf->Cell(30, 7, '............................', 0, 1, 'R');

		$pdf->Cell(150, 7, '2. Kiki Ahmad Nurijki', 0, 0, 'R');
		$pdf->Cell(30, 7, '............................', 0, 1, 'R');
		$pdf->Cell(150, 7, '3. Ira Mira', 0, 0, 'R');
		$pdf->Cell(30, 7, '............................', 0, 1, 'R');
		$pdf->Cell(150, 7, '4. Rahmat', 0, 0, 'R');
		$pdf->Cell(30, 7, '............................', 0, 1, 'R');
		$pdf->Cell(150, 7, '5. Dede D Sukandar', 0, 0, 'R');
		$pdf->Cell(30, 7, '............................', 0, 1, 'R');
		$pdf->Output();
	}
}

/* End of file cLaporan.php */
