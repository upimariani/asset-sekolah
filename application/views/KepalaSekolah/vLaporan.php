<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Laporan Kepala Sekolah</h1>


				</div>

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Laporan</li>
					</ol>
				</div>
			</div>
			<form action="<?= base_url('KepalaSekolah/cLaporan/laporan') ?>" method="POST">
				<div class="row">
					<div class="col-lg-4">
						<select class="form-control" name="laporan">
							<option value="">---Pilih Cetak Laporan Per Kategori---</option>
							<option value="1">Laporan Aset</option>
							<option value="2">Laporan Pengadaan</option>
							<!-- <option value="3">Laporan Monitoring</option> -->
							<option value="4">Laporan Penghapusan Aset</option>
						</select>
					</div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-warning">Cetak Surat Laporan</button>
					</div>
				</div>
			</form>


		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		} ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Asset</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">QR Code</th>
										<th class="text-center">Volume</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Kondisi</th>
										<th class="text-center">Jenis Aset</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($asset as $key => $value) {
										if ($value->status_aset == '0') {
									?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td class="text-center"><img width="150px" src="<?= base_url('asset/images/' . $value->qr_code . '.png') ?>"><br>
													<strong><?= $value->nama_barang ?></strong><br>
													<?= $value->kode_barang ?>
												</td>
												<td><?= $value->volume ?></td>
												<td>Rp. <?= number_format($value->harga)  ?></td>
												<td><?= $value->kondisi ?></td>
												<td><?= $value->jenis_aset ?></td>

											</tr>
									<?php
										}
									}
									?>

								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">QR Code</th>
										<th class="text-center">Volume</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Kondisi</th>
										<th class="text-center">Jenis Aset</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>

			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
