<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Asets Sekolah</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Asets</li>
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
					<a href="<?= base_url('Admin/cAsset/create') ?>" class="btn btn-default mb-3">
						<i class="fas fa-university"></i> Tambah Data Asets
					</a>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Asets</h3>
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
										<th class="text-center">Action</th>
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
												<td><?= $value->harga ?></td>
												<td><?= $value->kondisi ?></td>
												<td><?= $value->jenis_aset ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('Admin/cAsset/delete/' . $value->id_aset) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
														<a href="<?= base_url('Admin/cAsset/edit/' . $value->id_aset) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
														<button type="button" data-toggle="modal" data-target="#detail<?= $value->id_aset ?>" class="btn btn-primary"><i class="fas fa-th-list"></i></button>
													</div>
												</td>
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
										<th class="text-center">Action</th>
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
foreach ($asset as $key => $value) {
?>
	<div class="modal fade" id="detail<?= $value->id_aset ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Detail Aset</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-4">
							<img width="150px" src="<?= base_url('asset/images/' . $value->qr_code . '.png') ?>">
						</div>
						<div class="col-lg-8">
							<table class="table table-active">
								<tr>
									<td>Kode Asset</td>
									<td><strong><?= $value->kode_barang ?></strong></td>
								</tr>
								<tr>
									<td>Lokasi</td>
									<td><strong><?= $value->nama_lokasi ?></strong></td>
								</tr>
							</table>
						</div>
					</div>
					<table class="table">

						<tr>
							<th>Barang</th>
							<td><?= $value->nama_barang ?></td>
						</tr>
						<tr>
							<th>Lokasi</th>
							<td><?= $value->nama_lokasi ?></td>
						</tr>
						<tr>
							<th>Merk</th>
							<td><?= $value->merek ?></td>
						</tr>

						<tr>
							<th>Harga Asset</th>
							<td>Rp. <?= number_format($value->harga, 0)  ?></td>
						</tr>
						<tr>
							<th>Jumlah Asset</th>
							<td><?= $value->volume ?></td>
						</tr>
					</table>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php
}
?>
