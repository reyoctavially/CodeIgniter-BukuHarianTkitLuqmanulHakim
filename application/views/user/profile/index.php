<div class="container" style="margin-top: 50px">

	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Profil <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	if ($this->session->flashdata('flash3') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Kata sandi <strong>berhasil</strong> <?= $this->session->flashdata('flash3'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="card mb-3" style="max-width: 100%;">
			<div class="row g-0">
				<div class="col-md-2">
					<img src="<?= base_url('assets/images/profile/').$login['foto_siswa']; ?>" class="card-img mt-3">
					<hr>
					<a class="btn btn-primary" style="width: 100%;" href="<?= base_url(); ?>profile/user_edit/<?= $login['nis']; ?>">Edit Profil</a>
					<a class="btn btn-success mt-2" style="width: 100%;" href="<?= base_url(); ?>profile/user_password/<?= $login['nis']; ?>">Ganti Kata Sandi</a>
					<a class="btn btn-danger mt-2" style="width: 100%;" onclick="return confirm('Apakah anda yakin akan logout?');" href="<?= base_url(); ?>auth/logout">Logout</a>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Siswa</h5>
						<hr>
						<h5 class="card-title"><?= $login['nama_siswa'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted">NIS. <?= $login['nis']; ?> | NISN. <?= $login['nisn']; ?></h6>
						<p class="card-text">
							Nama panggilan : 
							<br/>
							<?= $login['nama_panggilan_siswa'] ?>
						</p>
						<p class="card-text">
							Jenis kelamin : 
							<br/>
							<?= $login['jenis_kelamin_siswa'] ?>
						</p>
						<p class="card-text">
							Tempat tanggal lahir : 
							<br/>
							<?= $login['tempat_lahir_siswa'] ?>, <?= $login['tgl_lahir_siswa'] ?>
						</p>
						<p class="card-text">
							Angkatan : 
							<br/>
							<?= $login['angkatan'] ?>
						</p>
						<p class="card-text">
							<small class="text-muted">Status : <?= $login['status_siswa'] ?></small>
							<br/>
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $login['date_created']); ?></small>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Orang Tua</h5>
						<hr>
						<h5 class="card-title"><?= $login['nama_ayah'] ?> (Ayah)</h5>
						<h6 class="card-subtitle mb-2 text-muted">Telp. <?= $login['telp_ayah']; ?></h6>
						<h5 class="card-title"><?= $login['nama_ibu'] ?> (Ibu)</h5>
						<h6 class="card-subtitle mb-2 text-muted">Telp. <?= $login['telp_ibu']; ?></h6>
						<p class="card-text">
							Alamat email : 
							<br/>
							<?= $login['email_orang_tua'] ?>
						</p>
						<p class="card-text">
							Alamat lengkap : 
							<br/>
							<?= $login['jalan_orang_tua'] ?>, Rt.<?= $login['rt_orang_tua'] ?> Rw.<?= $login['rw_orang_tua'] ?> No.<?= $login['no_rumah_orang_tua'] ?>, Kec.<?= $login['kec_orang_tua'] ?> Kab/kota.<?= $login['kab_orang_tua'] ?>, <?= $login['kode_pos_orang_tua'] ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>