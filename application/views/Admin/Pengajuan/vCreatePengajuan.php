<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Pengajuan Asset</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengajuan Asset</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Pengajuan Pengadaan Data
							<small>Masukkan Data Pengajuan Asset</small>
						</h3>
						<!-- tools box -->
						<div class="card-tools">
							<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.card-header -->
					<form action="<?= base_url('Admin/cPengajuan/create') ?>" method="POST">
						<div class="card-body pad">
							<div class="form-group">
								<label for="exampleInputEmail1">Lokasi</label>
								<select class="form-control" name="lokasi">
									<option value="">---Pilih Lokasi---</option>
									<?php
									foreach ($lokasi as $key => $value) {
									?>
										<option value="<?= $value->id_lokasi ?>"><?= $value->nama_lokasi ?></option>
									<?php
									}
									?>
								</select>
								<?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Nama Aset</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Aset">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Volume</label>
								<input type="number" name="volume" class="form-control" placeholder="Volume">
								<?= form_error('volume', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Satuan</label>
								<input type="text" name="satuan" class="form-control" placeholder="Satuan">
								<?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Harga Satuan</label>
								<input type="number" name="harga" class="form-control" placeholder="Harga Aset">
								<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Tahun Pengadaan</label>
								<input type="number" name="tahun" class="form-control" placeholder="Tahun Pengadaan">
								<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.col-->
		</div>
		<!-- ./row -->
	</section>
	<!-- /.content -->
</div>
