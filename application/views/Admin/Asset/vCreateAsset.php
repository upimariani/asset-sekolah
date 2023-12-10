<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Asset</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Asset</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title">Masukkan Data Asset</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('admin/cAsset/create'); ?>
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputPassword1">Kode Asset</label>
								<input type="text" name="kode" class="form-control" id="exampleInputPassword1" placeholder="Kode Asset">
								<?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Lokasi</label>
										<select class="form-control" name="lokasi">
											<option>---Pilih Lokasi---</option>
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
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Barang</label>
										<select class="form-control" name="barang">
											<option>---Pilih Barang---</option>
											<?php
											foreach ($barang as $key => $value) {
											?>
												<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
											<?php
											}
											?>
										</select>
										<?= form_error('barang', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>



							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Volume</label>
										<input type="number" name="volume" class="form-control" id="exampleInputPassword1" placeholder="Volume Asset">
										<?= form_error('volume', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Jenis Aset</label>
										<input type="text" name="jenis" class="form-control" id="exampleInputPassword1" placeholder="Jenis Asset">
										<?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Satuan</label>
										<input type="text" name="satuan" class="form-control" id="exampleInputPassword1" placeholder="Satuan">
										<?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Harga</label>
										<input type="number" name="harga" class="form-control" id="exampleInputPassword1" placeholder="Harga Aset">
										<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputPassword1">Kondisi</label>
										<input type="text" name="kondisi" class="form-control" id="exampleInputPassword1" placeholder="Kondisi Asset">
										<?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>

							</div>



						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-warning">Submit</button>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
