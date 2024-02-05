<div class="container" style="margin-top: 50px">

	<?php
	if ($this->session->flashdata('flash')) :
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
	if ($this->session->flashdata('flash3')) :
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
					<img src="<?= base_url('assets/images/profile/') . $guru['foto_guru']; ?>" class="card-img mt-3">
					<hr>
					<a class="btn btn-primary" style="width: 100%; margin-bottom: 10px;" href="<?= base_url(); ?>adminpanel/cetak_nip/<?= $guru['nip']; ?>">Cetak Data Guru</a>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Guru</h5>
						<hr>
						<h5 class="card-title"><?= $guru['nama_guru'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= $guru['nip']; ?></h6>

						<p class="card-text">
							<small class="text-muted">Status : <?= $guru['status_guru'] ?></small>
							<br />
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $guru['date_created']); ?></small>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card-body">
						<h5 class="card-title">Data Lainnya</h5>
						<hr>
						<p class="card-text">
							Alamat email :
							<br />
							<?= $guru['email_guru'] ?>
						</p>
						<p class="card-text">
							Nomor Telepon :
							<br />
							<?= $guru['telp_guru'] ?>
						</p>
						<p class="card-text">
							Alamat lengkap :
							<br />
							<?= $guru['jalan_guru'] ?>, Rt.<?= $guru['rt_guru'] ?> Rw.<?= $guru['rw_guru'] ?> No.<?= $guru['no_rumah_guru'] ?>, Kec.<?= $guru['kec_guru'] ?> Kab/kota.<?= $guru['kab_guru'] ?>, <?= $guru['kode_pos_guru'] ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>