<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/view.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Pertumbuhan Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data pertumbuhan siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $pertumbuhan['nama_siswa']; ?> | <?= $pertumbuhan['nis']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Tanggal <?= $pertumbuhan['tgl_input']; ?></h6>
					<hr>
					<p class="card-text">
						Tinggi Badan :
						<br />
						<?= $pertumbuhan['tinggi_badan_siswa']; ?> cm.
					</p>
					<p class="card-text">
						Berat Badan :
						<br />
						<?= $pertumbuhan['berat_badan_siswa']; ?> kg.
					</p>
					<p class="card-text">
						Lingkar Kepala :
						<br />
						<?= $pertumbuhan['lingkar_kepala_siswa']; ?> cm.
					</p>
					<hr>
					<p class="card-text">
						Keterangan kesehatan :
						<br />
						<?= $pertumbuhan['ket_kesehatan_siswa']; ?>.
					</p>
					<hr>
					<p class="card-text">
						<small class="text-muted">Yang mengisi : <?= $pertumbuhan['nama_guru'] ?></small>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>