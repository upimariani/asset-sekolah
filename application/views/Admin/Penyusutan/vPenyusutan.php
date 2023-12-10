<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Penyusutan Asset</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Penyusutan</li>
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
				<div class="col-10">
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-sync-alt"></i> Tambah Data Penyusutan Aset
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Penyusutan Asset</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Kode</th>
										<th class="text-center">Nama Asset</th>
										<th class="text-center">Harga Perolehan</th>
										<th class="text-center">Kelompok</th>
										<th class="text-center">Nilai Residu</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($asset_penyusutan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><img style="width: 50px;" src="<?= base_url('asset/images/' . $value->qr_code . '.png') ?>">
												<br><?= $value->kode_barang ?>
											</td>
											<td class="text-center"><?= $value->nama_barang ?></td>
											<td class="text-center">Rp. <?= number_format($value->harga)  ?></td>

											<td class="text-center"><?= $value->kelompok ?></td>
											<td class="text-center"><?= $value->nilai_residu ?>%</td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cPenyusutan/detail/' . $value->id_aset) ?>" class="btn btn-danger"> <i class="fas fa-level-down-alt"></i> Detail Penyusutan</a>
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
										<th class="text-center">Kode</th>
										<th class="text-center">Nama Asset</th>
										<th class="text-center">Harga Perolehan</th>
										<th class="text-center">Kelompok</th>
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
		<form action="<?= base_url('admin/cPenyusutan/create') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Penyusutan Asset</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Aset</label>
						<select class="form-control" name="asset" required>
							<option value="">--Pilih Aset---</option>
							<?php
							foreach ($asset as $key => $value) {
								if ($value->id_tipe_harta == '0') {
							?>
									<option value="<?= $value->id_aset ?>"><?= $value->nama_barang ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nilai Residu</label>
						<select class="form-control" name="harta" id="tipe_harta" required>
							<option value="">--Pilih Nilai Residu---</option>
							<?php
							foreach ($tipe_harta as $key => $value) {
							?>
								<option data-kelompok="<?= $value->kelompok ?>" data-umur="<?= $value->umur_ekonomis ?>" data-residu="<?= $value->nilai_residu ?>" value="<?= $value->id_tipe_harta ?>"><?= $value->kelompok ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Kelompok</label>
						<input type="text" name="password" class="kelompok form-control" id="exampleInputEmail1" readonly>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Umur Ekonomis</label>
						<input type="text" name="jabatan" class="umur form-control" id="exampleInputEmail1" readonly>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nilai Residu</label>
						<input type="text" name="jabatan" class="residu form-control" id="exampleInputEmail1" readonly>
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
