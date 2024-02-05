<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/view.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Monitoring Al-Qur'an</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data monitoring Al-Qur'an</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $monitoring['nama_siswa']; ?> | <?= $monitoring['nis']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Tanggal <?= $monitoring['tgl_belajar']; ?></h6>
					<hr>
					<p class="card-text">
						Hafalan surat :
						<br />
						<?= $monitoring['hafalan_surat']; ?>.
					</p>
					<p class="card-text">
						Murajaah Hafalan :
						<br />
						<?= $monitoring['murajaah_hafalan']; ?>.
					</p>
					<p class="card-text">
						Ummi :
						<br />
						Jilid <?= $monitoring['ummi_jilid']; ?>, halaman <?= $monitoring['ummi_halaman']; ?>.
					</p>
					<hr>
					<p class="card-text">
						Nilai :
						<br />
						<?= $monitoring['nilai']; ?>.
					</p>
					<hr>
					<p class="card-text">
						Keterangan :
						<br />
						<?= $monitoring['keterangan']; ?>.
					</p>
					<hr>
					<p class="card-text">
						<small class="text-muted">Yang menilai : <?= $monitoring['nama_guru'] ?></small>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>