<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Penyusutan Aset</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Detail</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">
					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Detail Penyusutan Aset
									<small class="float-right">Date: <?= date('Y-m-d') ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								Aset
								<address>
									<strong><?= $detail['asset']->nama_barang ?></strong><br>
									<?= $detail['asset']->kode_barang ?><br>
									Volume. <strong><?= $detail['asset']->volume ?></strong><br>
									Harga Perolehan. <strong>Rp. <?= number_format($detail['asset']->harga)  ?></strong><br>
									<hr>
									Kelompok. <strong><?= $detail['asset']->kelompok ?></strong><br>
									Umur Ekonomis. <strong><?= $detail['asset']->umur_ekonomis ?> tahun</strong><br>
									Nilai Residu. <strong><?= $detail['asset']->nilai_residu ?> %</strong>
								</address>
							</div>
							<!-- /.col -->

							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Tahun Ke - </th>
											<th>Biaya Penyusutan</th>
											<th>Akumulasi Penyusutan</th>
											<th>Harga Aset</th>
										</tr>
									</thead>
									<?php
									//menghitung nilai residu
									$ue = $detail['asset']->harga * ($detail['asset']->nilai_residu / 100);
									$penyusutan = ($detail['asset']->harga - $ue) / $detail['asset']->umur_ekonomis;

									?>
									<tbody>
										<?php
										$residu = 0;
										for ($i = 0; $i < $detail['asset']->umur_ekonomis; $i++) {
											$residu = $penyusutan + $residu;
										?>
											<tr>
												<td><?= $i + 1 ?></td>
												<td>Rp. <?= number_format($penyusutan) ?></td>
												<td>Rp. <?= number_format($residu) ?></td>
												<td>Rp. <?= number_format($detail['asset']->harga - $residu) ?></td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<hr>
						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<button type="submit" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>

							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
