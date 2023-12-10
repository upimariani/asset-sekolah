<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Penghapusan Asets Sekolah</h1>
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
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-trash"></i> Tambah Data Penghapusan Asets
					</button>
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
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Faktor</th>
										<th class="text-center">Tanggal Penghapusan</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penghapusan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><img width="150px" src="<?= base_url('asset/images/' . $value->qr_code . '.png') ?>"><br>
												<strong><?= $value->nama_barang ?></strong><br>
												<?= $value->kode_barang ?>
											</td>
											<td><?= $value->jumlah ?></td>
											<td><?= $value->faktor ?></td>
											<td><?= $value->tgl_penghapusan ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cAsset/delete/' . $value->id_aset) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_aset ?>">
														<i class="fas fa-edit"></i>
													</button>
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
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Faktor</th>
										<th class="text-center">Tanggal Penghapusan</th>
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
		<form action="<?= base_url('admin/cpenghapusan/create') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Penghapusan Aset</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<div class="form-group">
						<label for="exampleInputEmail1">Nama Asset</label>
						<select class="form-control" name="aset" required>
							<option value="">--Pilih Aset---</option>
							<?php
							foreach ($asset as $key => $value) {
							?>
								<option value="<?= $value->id_aset ?>"><?= $value->nama_barang ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Jumlah</label>
						<input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Penghapusan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Faktor</label>
						<textarea name="faktor" class="form-control" id="exampleInputEmail1" placeholder="Faktor Penghapusan" rows="5" required></textarea>
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
foreach ($penghapusan as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_aset ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/cpenghapusan/update/' . $value->id_penghapusan . '/' . $value->id_aset) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Penghapusan Aset</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">


						<div class="form-group">
							<label for="exampleInputEmail1">Nama Asset</label>
							<select class="form-control" name="aset" required>
								<option value="">--Pilih Aset---</option>
								<?php
								foreach ($asset as $key => $item) {
								?>
									<option value="<?= $item->id_aset ?>" <?php if ($value->id_aset == $item->id_aset) {
																				echo 'selected';
																			} ?>><?= $item->nama_barang ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Jumlah</label>
							<input type="text" name="jumlah" value="<?= $value->jumlah ?>" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Penghapusan" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Faktor</label>
							<textarea name="faktor" class="form-control" id="exampleInputEmail1" placeholder="Faktor Penghapusan" rows="5" required><?= $value->faktor ?></textarea>
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
