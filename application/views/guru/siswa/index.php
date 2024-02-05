<!-- ======= Section ======= -->
<section id="about" class="about">
	<div class="container">
		<?php
		if ($this->session->flashdata('flash')) :
		?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data siswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?> silahkan lakukan <strong>aktivasi akun</strong> melalui email orang tua.
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
						Data siswa <strong>berhasil</strong> <?= $this->session->flashdata('flash2'); ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row flex-lg-row align-items-center">
			<div class="col-5 col-sm-3 col-lg-2">
				<img src="<?= base_url(); ?>assets/images/bocil3.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
			</div>
			<div class="col-lg-10">
				<figure>
					<blockquote class="blockquote">
						<p>Data Siswa</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">siswa</cite>
					</figcaption>
				</figure>
				<a href="<?= base_url(); ?>siswa/tambah" class="btn btn-success">Tambah Data Siswa</a>
			</div>
		</div>

		<br />

		<table class="table table-striped table-hover">
			<tr>
				<td>
					<form class="row g-2" method="POST" action="<?= base_url('siswa/cetak') ?>">
						<div class="col-md-4">
							<select class="form-select angkatan" aria-label="Default select example" id="colFormLabel" name="angkatan">
								<option value="">Pilih Angkatan</option>
								<?php foreach ($angkatan as $sw) : ?>
									<option value="<?= $sw['angkatan']; ?>"><?= $sw['angkatan']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-4">
							<a href="" class="btn btn-success">Semua Angkatan</a>
							<button type="submit" name="cetak" class="btn btn-primary">Cetak Data Siswa</button>
						</div>
					</form>
				</td>
			</tr>
		</table>

		<table id="siswa" class="display">
			<caption>Tabel data siswa</caption>
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">NIS</th>
					<th class="text-center">Nama Siswa</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Angkatan</th>
					<th class="text-center">Status</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$nomor = 1;
				foreach ($siswa as $sw) :
				?>
					<tr>
						<td class="text-center"><?= $nomor++ ?></td>
						<td class="text-center"><?= $sw['nis'] ?></td>
						<td><?= $sw['nama_siswa'] ?></td>
						<td class="text-center"><?= $sw['jenis_kelamin_siswa'] ?></td>
						<td class="text-center"><?= $sw['angkatan'] ?></td>
						<td class="text-center"><?= $sw['status_siswa'] ?></td>
						<td>
							<a class="btn btn-danger float-end disabled m-1" onclick="return confirm('Apakah anda yakin akan mengahapus data siswa?');" href="<?= base_url(); ?>siswa/hapus/<?= $sw['nis']; ?>">Hapus</a>
							<a class="btn btn-primary float-end m-1" href="<?= base_url(); ?>siswa/edit/<?= $sw['nis']; ?>">Edit</a>
							<a class="btn btn-success float-end m-1" href="<?= base_url(); ?>siswa/detail/<?= $sw['nis']; ?>">Rincian</a>
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
		$('#siswa').DataTable();

		function filterData() {
			$('#siswa').DataTable().search(
				$('.angkatan').val()
			).draw();
		}
		$('.angkatan').on('change', function() {
			filterData();
		});
	});

	var map = {};
	$('select option').each(function() {
		if (map[this.value]) {
			$(this).remove()
		}
		map[this.value] = true;
	})
</script>