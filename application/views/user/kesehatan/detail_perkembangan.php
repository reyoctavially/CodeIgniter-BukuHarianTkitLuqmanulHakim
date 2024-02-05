<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/view.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Perkembangan Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data perkembangan siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $perkembangan['nama_siswa']; ?> | <?= $perkembangan['nis']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Tanggal Pemeriksaan <?= $perkembangan['tgl_pemeriksaan']; ?>, Semester <?= $perkembangan['semester']; ?></h6>
					<hr>
					<p class="card-text">
						Usia saat pemeriksaan :
						<br />
						<?= $perkembangan['usia_pemeriksaan']; ?> cm.
					</p>
					<hr>
					<p class="card-text">
						Tinggi Badan :
						<br />
						<?= $perkembangan['tinggi_badan']; ?> kg.
					</p>
					<p class="card-text">
						Berat Badan :
						<br />
						<?= $perkembangan['berat_badan']; ?> kg.
					</p>
					<p class="card-text">
						Lingkar Kepala :
						<br />
						<?= $perkembangan['lingkar_kepala']; ?>.
					</p>
					<hr>
					<p class="card-text">
						Daya lihat :
						<br />
						<?= $perkembangan['daya_lihat']; ?>.
					</p>
					<p class="card-text">
						Daya dengar :
						<br />
						<?= $perkembangan['daya_dengar']; ?>.
					</p>
					<hr>
					<p class="card-text">
						Keterangan kuku :
						<br />
						<?= $perkembangan['ket_kuku']; ?>.
					</p>
					<p class="card-text">
						Keterangan rambut :
						<br />
						<?= $perkembangan['ket_rambut']; ?>.
					</p>
					<p class="card-text">
						Keterangan gigi :
						<br />
						<?= $perkembangan['ket_gigi']; ?>.
					</p>
					<hr>
					<p class="card-text">
						Keterangan perkembangan anak :
						<br />
						<?= $perkembangan['perkembangan_anak']; ?>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>