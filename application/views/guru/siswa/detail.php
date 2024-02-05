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
					<img src="<?= base_url('assets/images/profile/').$siswa['foto_siswa']; ?>" class="card-img mt-3">
					<hr>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Siswa</h5>
						<hr>
						<h5 class="card-title"><?= $siswa['nama_siswa'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted">NIS. <?= $siswa['nis']; ?> | NISN. <?= $siswa['nisn']; ?></h6>
						<p class="card-text">
							Nama panggilan : 
							<br/>
							<?= $siswa['nama_panggilan_siswa'] ?>
						</p>
						<p class="card-text">
							Jenis kelamin : 
							<br/>
							<?= $siswa['jenis_kelamin_siswa'] ?>
						</p>
						<p class="card-text">
							Tempat tanggal lahir : 
							<br/>
							<?= $siswa['tempat_lahir_siswa'] ?>, <?= $siswa['tgl_lahir_siswa'] ?>
						</p>
						<p class="card-text">
							Angkatan : 
							<br/>
							<?= $siswa['angkatan'] ?>
						</p>
						<p class="card-text">
							<small class="text-muted">Status : <?= $siswa['status_siswa'] ?></small>
							<br/>
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $siswa['date_created']); ?></small>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Orang Tua</h5>
						<hr>
						<h5 class="card-title"><?= $siswa['nama_ayah'] ?> (Ayah)</h5>
						<h6 class="card-subtitle mb-2 text-muted">Telp. <?= $siswa['telp_ayah']; ?></h6>
						<h5 class="card-title"><?= $siswa['nama_ibu'] ?> (Ibu)</h5>
						<h6 class="card-subtitle mb-2 text-muted">Telp. <?= $siswa['telp_ibu']; ?></h6>
						<p class="card-text">
							Alamat email : 
							<br/>
							<?= $siswa['email_orang_tua'] ?>
						</p>
						<p class="card-text">
							Alamat lengkap : 
							<br/>
							<?= $siswa['jalan_orang_tua'] ?>, Rt.<?= $siswa['rt_orang_tua'] ?> Rw.<?= $siswa['rw_orang_tua'] ?> No.<?= $siswa['no_rumah_orang_tua'] ?>, Kec.<?= $siswa['kec_orang_tua'] ?> Kab/kota.<?= $siswa['kab_orang_tua'] ?>, <?= $siswa['kode_pos_orang_tua'] ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>