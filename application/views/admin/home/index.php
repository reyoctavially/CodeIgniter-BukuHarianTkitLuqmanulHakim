<!-- ======= Section ======= -->
<section id="about" class="about">
	<div class="container">
		<?php
		if ($this->session->flashdata('flash')) :
		?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data guru <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?> silahkan lakukan <strong>aktivasi akun</strong> melalui email guru.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php
		if ($this->session->flashdata('flash2')) :
		?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data guru <strong>berhasil</strong> <?= $this->session->flashdata('flash2'); ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row flex-lg-row align-items-center">
			<!-- <div class="col-5 col-sm-3 col-lg-2">
				<img src="<?= base_url(); ?>assets/images/bocil3.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
			</div> -->
			<div class="col-lg-10">
				<figure>
					<blockquote class="blockquote">
						<img src="<?= base_url(); ?>assets/icon/view.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
						<p>Data Guru</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">guru</cite>
					</figcaption>
				</figure>
				<a href="<?= base_url(); ?>adminpanel/tambah" class="btn btn-success">Tambah Data Guru</a>
				<a href="<?= base_url(); ?>adminpanel/cetak" class="btn btn-primary">Cetak Data Guru</a>
			</div>
		</div><br>
		<table id="guru" class="table table-striped table-hover">
			<caption>Tabel data guru</caption>
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">NIP</th>
					<th class="text-center">Nama Lengkap</th>
					<th class="text-center">No Telepon</th>
					<th class="text-center">Status</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$nomor = 1;
				foreach ($guru as $gr) :
				?>
					<tr>
						<td class="text-center"><?= $nomor++ ?></td>
						<td class="text-center"><?= $gr['nip'] ?></td>
						<td><?= $gr['nama_guru'] ?></td>
						<td class="text-center"><?= $gr['telp_guru'] ?></td>
						<td class="text-center"><?= $gr['status_guru'] ?></td>
						<td>
							<a class="btn btn-danger float-end disabled" onclick="return confirm('Apakah anda yakin akan mengahapus data guru?');" href="<?= base_url(); ?>adminpanel/hapus/<?= $gr['nip']; ?>">Hapus</a>
							<a class="btn btn-primary float-end" href="<?= base_url(); ?>adminpanel/edit/<?= $gr['nip']; ?>">Edit</a>
							<a class="btn btn-success float-end" href="<?= base_url(); ?>adminpanel/detail/<?= $gr['nip']; ?>">Rincian</a>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>


	</div>
</section><!-- End Section -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function() {
		$('#guru').DataTable();
	});
</script>