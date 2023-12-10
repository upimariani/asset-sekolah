<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Peminjaman Asets</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Peminjaman</li>
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
				<div class="col-10  ">
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-thumbtack"></i> Tambah Data Peminjaman Asets
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Peminjaman</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Peminjam</th>
										<th class="text-center">Nama Asets</th>
										<th class="text-center">Tanggal Peminjaman</th>
										<th class="text-center">Tanggal Pengembalian</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($peminjaman as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_peminjam ?></td>
											<td class="text-center"><?= $value->nama_barang ?></td>
											<td class="text-center"><?= $value->tgl_peminjaman ?></td>
											<td class="text-center"><?php
																	if ($value->tgl_pengembalian == NULL) {
																	?>
													<span class="badge badge-danger">Belum Dikembalikan</span>
												<?php
																	} else {
												?>
													<?= $value->tgl_pengembalian ?>
												<?php
																	}
												?>
											</td>
											<td class="text-center"><?php
																	if ($value->status == '0') {
																	?>
													<span class="badge badge-danger">Sedang Digunakan</span>
												<?php
																	} else {
												?>
													<span class="badge badge-success">Sudah Dikembalikan</span>
												<?php
																	}
												?>
											</td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cPeminjaman/delete/' . $value->id_peminjam) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_peminjam ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
													<button type="button" data-toggle="modal" data-target="#selesai<?= $value->id_peminjam ?>" class="btn btn-success"><i class="fas fa-seedling"></i></button>
												</div>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Peminjam</th>
										<th class="text-center">Nama Asets</th>
										<th class="text-center">Tanggal Peminjaman</th>
										<th class="text-center">Tanggal Pengembalian</th>
										<th class="text-center">Status</th>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<form action="<?= base_url('admin/cPeminjaman/create') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Peminjam</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="exampleInputEmail1">Nama Barang</label>
						<select class="form-control" name="aset" required>
							<option value="">--Pilih Asets---</option>
							<?php
							foreach ($asets as $key => $value) {
								if ($value->status_aset == '0') {
							?>
									<option value="<?= $value->id_aset ?>"><?= $value->nama_barang ?> | Kode. <strong><?= $value->kode_barang ?></strong></option>
							<?php
								}
							}
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Peminjam</label>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Peminjaman" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tanggal Peminjaman</label>
						<input type="date" value="<?= date('Y-m-d') ?>" name="tgl_pinjam" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
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
<!-- /.modal -->
<?php
foreach ($peminjaman as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_peminjam ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/cPeminjaman/update/' . $value->id_peminjam) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Peminjaman</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label for="exampleInputEmail1">Nama Barang</label>
							<select class="form-control" name="aset" required>
								<option value="">--Pilih Asets---</option>
								<?php
								foreach ($asets as $key => $item) {
									if ($item->status_aset == '0') {
								?>
										<option value="<?= $item->id_aset ?>" <?php if ($value->id_aset == $item->id_aset) {
																					echo 'selected';
																				} ?>><?= $item->nama_barang ?> | Kode. <strong><?= $item->kode_barang ?></strong></option>
								<?php
									}
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Peminjam</label>
							<input type="text" name="nama" value="<?= $value->nama_peminjam ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Peminjaman" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Peminjaman</label>
							<input type="date" value="<?= $value->tgl_peminjaman ?>" name="tgl_pinjam" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
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
	<!-- /.modal -->
<?php
}
?>

<?php
foreach ($peminjaman as $key => $value) {
?>
	<div class="modal fade" id="selesai<?= $value->id_peminjam ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/cPeminjaman/dikembalikan/' . $value->id_peminjam) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Asets Dikembalikan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Apakah Asets sudah dikembalikan?</p>
						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Pengembalian</label>
							<input type="date" name="tgl_kembali" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
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
	<!-- /.modal -->
<?php
}
?>
