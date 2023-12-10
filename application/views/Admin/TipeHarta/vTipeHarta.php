<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tipe Harta</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tipe Harta</li>
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
						<i class="fas fa-tag"></i> Tambah Data Tipe Harta
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Tipe Harta</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Kelompok</th>
										<th class="text-center">Umur Ekonomis</th>
										<th class="text-center">Nilai Residu</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($tipe_harta as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->kelompok ?></td>
											<td class="text-center"><?= $value->umur_ekonomis ?></td>
											<td class="text-center"><?= $value->nilai_residu ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKelolaData/deleteuser/' . $value->id_tipe_harta) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_tipe_harta ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Kelompok</th>
										<th class="text-center">Umur Ekonomis</th>
										<th class="text-center">Nilai Residu</th>
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
		<form action="<?= base_url('admin/ckeloladata/createtipeharta') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Tipe Harta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Kelompok</label>
						<input type="text" name="kelompok" class="form-control" id="exampleInputEmail1" placeholder="Kelompok Tipe Harta" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Umur Ekonomis</label>
						<input type="number" name="umur" class="form-control" id="exampleInputEmail1" placeholder="Umur Ekonomis" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nilai Residu</label>
						<input type="text" name="nilai" class="form-control" id="exampleInputEmail1" placeholder="Nilai Residu" required>
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
foreach ($tipe_harta as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_tipe_harta ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/ckeloladata/updatetipeharta/' . $value->id_tipe_harta) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Tipe Harta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Kelompok</label>
							<input type="text" name="kelompok" value="<?= $value->kelompok ?>" class="form-control" id="exampleInputEmail1" placeholder="Kelompok Tipe Harta" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Umur Ekonomis</label>
							<input type="number" name="umur" value="<?= $value->umur_ekonomis ?>" class="form-control" id="exampleInputEmail1" placeholder="Umur Ekonomis" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nilai Residu</label>
							<input type="text" name="nilai" class="form-control" value="<?= $value->nilai_residu ?>" id="exampleInputEmail1" placeholder="Nilai Residu" required>
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
