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
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row g-0">
				<div class="col-md-4">
					<img src="<?= base_url('assets/images/profile/') . $login['foto_guru']; ?>" class="card-img mt-3">
					<hr>
					<a class="btn btn-primary" style="width: 100%;" href="<?= base_url(); ?>profile/admin_edit/<?= $login['nip']; ?>">Edit</a>
					<a class="btn btn-success mt-2" style="width: 100%;" href="<?= base_url(); ?>profile/admin_password/<?= $login['nip']; ?>">Ganti Kata Sandi</a>
					<a class="btn btn-danger mt-2" style="width: 100%;" onclick="return confirm('Apakah anda yakin akan logout?');" href="<?= base_url(); ?>admin/logout">Logout</a>
					<hr>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $login['nama_guru'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= $login['nip']; ?></h6>
						<p class="card-text">
							<?= $login['email_guru'] ?> | <?= $login['telp_guru'] ?>
						</p>
						<p class="card-text">
							Alamat :
							<br />
							<?= $login['jalan_guru'] ?>, RT<?= $login['rt_guru'] ?> RW<?= $login['rw_guru'] ?> No.<?= $login['no_rumah_guru'] ?>, Kec.<?= $login['kec_guru'] ?> Kab/kota.<?= $login['kab_guru'] ?>, <?= $login['kode_pos_guru'] ?>
						</p>
						<hr>
						<p class="card-text">
							<small class="text-muted">Status : <?= $login['status_guru'] ?></small>
							<br />
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $login['date_created']); ?></small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>