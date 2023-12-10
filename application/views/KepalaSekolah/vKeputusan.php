<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Keputusan Pengadaan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengadaan</li>
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
				<div class="col-8">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Pengajuan Barang</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Tanggal Pengajuan</th>
										<th class="text-center">Volume Pengajuan</th>
										<th class="text-center">Status Pengajuan</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pengajuan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_aset ?></td>
											<td class="text-center"><?= $value->tgl_input ?></td>
											<td class="text-center"><?= $value->volume ?></td>
											<td class="text-center"><?php if ($value->status == '0') {
																	?>
													<span class="badge badge-warning">Menunggu Konfirmasi Kepala Sekolah</span>
												<?php
																	} else if ($value->status == '1') {
												?>
													<span class="badge badge-success">Selesai</span>
												<?php
																	} else if ($value->status == '2') {
												?>
													<span class="badge badge-danger">Ditolak!</span>
												<?php
																	}
												?>
											</td>
											<td class="text-center">
												<?php
												if ($value->status == '0') {
												?>
													<div class="btn-group">
														<a href="<?= base_url('Admin/cKeputusan/delete/' . $value->id_pengadaan) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
														<button type="button" data-toggle="modal" data-target="#keputusan<?= $value->id_pengadaan ?>" class="btn btn-warning"><i class="fas fa-th"></i></button>
													</div>
												<?php
												}
												?>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Tanggal Pengajuan</th>
										<th class="text-center">Total Pengajuan</th>
										<th class="text-center">Atas Nama Pengaju</th>
										<th class="text-center">Actions</th>
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

<?php
foreach ($pengajuan as $key => $value) {
?>
	<div class="modal fade" id="keputusan<?= $value->id_pengadaan ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('KepalaSekolah/ckeputusan/keputusan/' . $value->id_pengadaan) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Keputusan Pengajuan Barang</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Apakah Kepala Sekolah Mengkonfirmasi Pengajuan?</p>
						<div class="form-group">
							<input type="radio" name="acc" value="2">
							<label class="text-danger"> Tolak Pengadaan!</label>
						</div>
						<div class="form-group">
							<input type="radio" name="acc" value="1">
							<label class="text-success"> Konfirmasi Pengadaan</label>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php
}
?>


<!-- /.modal -->
