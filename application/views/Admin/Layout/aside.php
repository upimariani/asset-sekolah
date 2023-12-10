<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/logo.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">MTsN 9 Kuningan</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Selamat Datang, <br>Wakasek Sarpras</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData') {
														echo 'menu-open';
													}  ?>">
					<a href="<?= base_url('Admin/cKelolaData') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-archive"></i>
						<p>
							Data Master
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'user') {
																									echo 'active';
																								}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'kategori') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Kategori</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'barang') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/lokasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'lokasi') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Lokasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/tipe_harta') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'tipe_harta') {
																											echo 'active';
																										}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Tipe Harta</p>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cAsset') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAsset') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Asset
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cPengajuan') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPengajuan') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>Pengajuan</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?= base_url('Admin/cMonitoring') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cMonitoring') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-info-circle"></i>
						<p>Monitoring</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cPenyusutan') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPenyusutan') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-clipboard-check"></i>
						<p>Penyusutan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cPenghapusan') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPenghapusan') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-trash"></i>
						<p>Pengahapusan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cPeminjaman') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPeminjaman') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-thumbtack"></i>
						<p>Peminjaman Aset</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cAuth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>SignOut</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
