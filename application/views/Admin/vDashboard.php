<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Monitoring Asset</span>
							<span class="info-box-number">
								<?= $jml['monitoring']->jml_monitoring ?>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pengajuan Diterima</span>
							<span class="info-box-number"> <?= $jml['pengajuan']->jml_pengajuan ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-barcode"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Asset</span>
							<span class="info-box-number"> <?= $jml['asset']->jml_asset ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">User</span>
							<span class="info-box-number"> <?= $jml['user']->jml_user ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->



			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-8">
					<!-- MAP & BOX PANE -->


					<!-- TABLE: LATEST ORDERS -->
					<div class="card">
						<div class="card-header border-transparent">
							<h3 class="card-title">Status Pengajuan</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
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
							<!-- /.table-responsive -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<a href="<?= base_url('Admin/cPengajuan') ?>" class="btn btn-sm btn-info float-left">Lihat Pengajuan</a>
						</div>
						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->

				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->