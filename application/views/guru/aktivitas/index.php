<main id="main">
	<!-- ======= Section ======= -->
	<section id="about" class="about">
		<div class="container">

			<?php
			if ($this->session->flashdata('flash')) :
				?>
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Selamat anda <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="row flex-lg-row align-items-center">
				<div class="col-5 col-sm-3 col-lg-2">
					<img src="<?= base_url(); ?>assets/images/bocil1.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
				</div>
				<div class="col-lg-10">
					<figure>
						<blockquote class="blockquote">
							<p>Catatan Aktivitas Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan data <cite title="Source Title">aktivitas siswa dirumah</cite>
						</figcaption>
					</figure>
				</div>
			</div><br>
			<table class="table table-striped table-hover">
				<tr>
					<td colspan="6">
						<form  class="row g-2" method="POST" action="<?= base_url('aktivitas/cetak') ?>">
							<div class="col md-4">
								<label for="namaSiswa" class="form-label">Nama siswa</label>
								<select class="form-select" aria-label="namaSiswa" id="colFormLabel" name="nis">
									<?php foreach($siswa as $sw) : ?>
										<option value="<?= $sw['nis']; ?>"><?= $sw['nama_siswa']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col md-4">
								<label for="inputAwal" class="form-label">Dari tanggal</label>
								<input type="date" class="form-control" id="inputAwal" name="awal">
							</div>
							<div class="col md-4">
								<label for="inputAkhir" class="form-label">Sampai tanggal</label>
								<input type="date" class="form-control" id="inputAkhir" name="akhir">
							</div>
							<div class="col-12">
								<button type="submit" name="cetak" class="btn btn-primary" style="width: 100%;">Cetak Aktivitas Siswa</button>
							</div>
						</form>
					</td>
				</tr>
			</table>
			<table id="aktivitas" class="display">
				<caption>Tabel catatan aktivitas siswa</caption>
				<thead>
					<tr>
						<th></th>
						<th class="text-center">No</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Nama Siswa</th>
						<th class="text-center">Sholat</th>
						<th class="text-center">Doa Harian</th>
						<th class="text-center">Hafalan & Ummi</th>
						<th class="text-center">Opsi</th>
						<th class="text-center"> </th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($aktivitas as $avs) :
						?>
						<tr data-child-value="
						<b>Jam bangun: </b>
						<br>
						<?= $avs['jam_bangun'] ?>
						<br>
						<b>Jam tidur: </b>
						<br>
						<?= $avs['jam_tidur'] ?>
						<hr>
						<b>Catatan kegiatan sentra:</b>
						<br>
						<?= $avs['catatan_kegiatan'] ?>
						<br>
						<b>Catatan guru:</b>
						<br>
						<?= $avs['catatan_guru'] ?>
						">
						<td class="dt-control"></td>
						<td class="text-center"><?= $nomor++ ?></td>
						<td class="text-center"><?= $avs['tgl_aktivitas'] ?></td>
						<td><?= $avs['nama_siswa'] ?></td>
						<td class="text-center">
							<?php
							$sholat = $avs['pembiasaan_sholat'];
							if ($sholat == 1) {
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<td class="text-center">
							<?php
							$doa = $avs['membaca_doa_harian'];
							if ($doa == 1) {
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<td class="text-center">
							<?php
							$hafalan = $avs['mengulang_hafalan_dan_ummi'];
							if ($hafalan == 1) {
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<?php
						$catatan = $avs['catatan_guru'];
						if ($catatan == "") {
							?>
							<td class="text-center">
								<a class="btn btn-primary float-end m-1" href="<?= base_url(); ?>aktivitas/catatan/<?= $avs['kode_aktivitas_siswa']; ?>">Catatan</a>
								<a class="btn btn-danger float-end disabled m-1" href="<?= base_url(); ?>aktivitas/edit_catatan/<?= $avs['kode_aktivitas_siswa']; ?>">Edit</a>
								<a class="btn btn-success float-end m-1" href="<?= base_url(); ?>aktivitas/guru_detail/<?= $avs['kode_aktivitas_siswa']; ?>">Rincian</a>
							</td>
							<?php
						} else {
							?>
							<td class="text-center">
								<a class="btn btn-primary float-end disabled m-1" href="<?= base_url(); ?>aktivitas/catatan/<?= $avs['kode_aktivitas_siswa']; ?>">Catatan</a>
								<a class="btn btn-danger float-end m-1" href="<?= base_url(); ?>aktivitas/edit_catatan/<?= $avs['kode_aktivitas_siswa']; ?>">Edit</a>
								<a class="btn btn-success float-end m-1" href="<?= base_url(); ?>aktivitas/guru_detail/<?= $avs['kode_aktivitas_siswa']; ?>">Rincian</a>
							</td>
							<?php
						}
						?>
						<td class="text-center">
							<?php
							$aktivitas = $avs['review'];
							if($aktivitas == 1){
								?>
								<img src="<?= base_url(); ?>assets/icon/smile_check.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<a href="<?= base_url(); ?>aktivitas/guru_check/<?= $avs['kode_aktivitas_siswa']; ?>">
									<img src="<?= base_url(); ?>assets/icon/smile.png" style="width: 25px; height: 25px;">
								</a>
								<?php
							}
							?>
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
	function format(value) {
		return '<div>' + value + '</div>';
	}

	$(document).ready(function() {
		var table = $('#aktivitas').DataTable();

		$('#aktivitas tbody').on('click', 'td.dt-control', function () {
			var tr = $(this).closest('tr');
			var row = table.row( tr );

			if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(format(tr.data('child-value'))).show();
            tr.addClass('shown');
        }
    } );
	});
</script>