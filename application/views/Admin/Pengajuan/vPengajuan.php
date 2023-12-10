<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pengajuan Asset</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengajuan</li>
					</ol>
				</div>
			</div>
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
					<a href="<?= base_url('Admin/cPengajuan/create') ?>" class="btn btn-default mb-3">
						<i class="fas fa-list"></i> Tambah Data Pengajuan Asset
					</a>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Pengajuan Asset</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal Pengajuan</th>
										<th class="text-center">Nama Aset</th>
										<th class="text-center">Volume</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Tahun Pengadaan</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pengajuan as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->tgl_input ?></td>
											<td><?= $value->nama_aset ?></td>
											<td><?= $value->volume ?></td>
											<td><?= $value->satuan ?></td>
											<td>Rp. <?= number_format($value->harga_satuan)  ?></td>
											<td><?= $value->tahun_pengadaan ?></td>
											<td class="text-center"><?php if ($value->status == '0') {
																	?>
													<span class="badge badge-warning">Menunggu Konfirmasi Kepala Sekolah</span>
												<?php
																	} else if ($value->status == '1') {
												?>
													<span class="badge badge-info">Asset Disetujui</span>
												<?php
																	} else if ($value->status == '2') {
												?>
													<span class="badge badge-danger">Ditolak!</span>

												<?php
																	} ?>
											</td>

										</tr>
									<?php
									}
									?>

								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal Pengajuan</th>
										<th class="text-center">Nama Aset</th>
										<th class="text-center">Volume</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Tahun Pengadaan</th>
										<th class="text-center">Status</th>
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
