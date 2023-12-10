<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Barang</li>
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
						<i class="fas fa-university"></i> Tambah Data Barang
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Barang</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Kategori Barang</th>
										<th class="text-center">Merek</th>
										<th class="text-center">Tahun Perolehan</th>
										<th class="text-center">Spesifikasi</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><img style="width: 250px;" src="<?= base_url('asset/foto-barang/' . $value->picture) ?>"></td>
											<td class="text-center"><?= $value->nama_barang ?></td>
											<td class="text-center"><?= $value->nama_kategori ?></td>
											<td class="text-center"><?= $value->merek ?></td>
											<td class="text-center"><?= $value->tahun_perolehan ?></td>
											<td class="text-center"><?= $value->spesifikasi ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKelolaData/deletebarang/' . $value->id_barang) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Gambar</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Kategori Barang</th>
										<th class="text-center">Merek</th>
										<th class="text-center">Tahun Perolehan</th>
										<th class="text-center">Spesifikasi</th>
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
		<?php echo form_open_multipart('admin/ckeloladata/createbarang'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Kategori Barang</label>
					<select class="form-control" name="kategori" required>
						<option value="">---Pilih Kategori Barang---</option>
						<?php
						foreach ($kategori as $key => $value) {
						?>
							<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Barang</label>
					<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Merek</label>
					<input type="text" name="merek" class="form-control" id="exampleInputEmail1" placeholder="Merek" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tahun Perolehan</label>
					<input type="number" name="thn" class="form-control" id="exampleInputEmail1" placeholder="Tahun Perolehan" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Spesifikasi</label>
					<input type="text" name="spesifikasi" class="form-control" id="exampleInputEmail1" placeholder="Spesifikasi" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Picture</label>
					<input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
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
foreach ($barang as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_barang ?>">
		<div class="modal-dialog">
			<?php echo form_open_multipart('admin/ckeloladata/updatebarang/' . $value->id_barang); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Barang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Kategori Barang</label>
						<select class="form-control" name="kategori" required>
							<option value="">---Pilih Kategori Barang---</option>
							<?php
							foreach ($kategori as $key => $item) {
							?>
								<option value="<?= $item->id_kategori ?>" <?php if ($value->id_kategori == $item->id_kategori) {
																				echo 'selected';
																			} ?>><?= $item->nama_kategori ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Barang</label>
						<input type="text" name="nama" value="<?= $value->nama_barang ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Merek</label>
						<input type="text" name="merek" value="<?= $value->merek ?>" class="form-control" id="exampleInputEmail1" placeholder="Merek" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tahun Perolehan</label>
						<input type="number" name="thn" value="<?= $value->tahun_perolehan ?>" class="form-control" id="exampleInputEmail1" placeholder="Tahun Perolehan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Spesifikasi</label>
						<input type="text" name="spesifikasi" value="<?= $value->spesifikasi ?>" class="form-control" id="exampleInputEmail1" placeholder="Spesifikasi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Picture</label><br>
						<img style="width: 250px;" src="<?= base_url('asset/foto-barang/' . $value->picture) ?>">
						<input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Nama">
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
				</form>
				<!-- /.modal-content -->
			</div>
		</div>
		<!-- /.modal-dialog -->
	</div>


<?php
}
?>
