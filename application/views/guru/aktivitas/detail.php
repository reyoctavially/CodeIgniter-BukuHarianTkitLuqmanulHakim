<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/view.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Aktivitas Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data aktivitas siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<?php
					if ($aktivitas['review'] == 1) {
					?>
						<img src="<?= base_url(); ?>assets/icon/smile_check.png" class="float-end" style="width: 50px; height: 50px;">
					<?php
					} else {
					?>
						<img src="<?= base_url(); ?>assets/icon/smile.png" class="float-end" style="width: 50px; height: 50px;">
					<?php
					}
					?>
					<h5 class="card-title"><?= $aktivitas['nama_siswa']; ?> | <?= $aktivitas['nis']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Tanggal <?= $aktivitas['tgl_aktivitas']; ?></h6>
					<hr>
					<p class="card-text">
						Jam bangun :
						<br />
						<?= $aktivitas['jam_bangun']; ?>.
					</p>
					<p class="card-text">
						Jam tidur :
						<br />
						<?= $aktivitas['jam_tidur']; ?>.
					</p>
					<hr>
					<p class="card-text">
						<?php
						$avs = $aktivitas['pembiasaan_sholat'];
						if ($avs == 1) {
						?>
							<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
						<?php
						} else {
						?>
							<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
						<?php
						}
						?>
						Pembiasaan Sholat.
					</p>
					<p class="card-text">
						<?php
						$avs = $aktivitas['membaca_doa_harian'];
						if ($avs == 1) {
						?>
							<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
						<?php
						} else {
						?>
							<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
						<?php
						}
						?>
						Membaca doa harian.
					</p>
					<p class="card-text">
						<?php
						$avs = $aktivitas['mengulang_hafalan_dan_ummi'];
						if ($avs == 1) {
						?>
							<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
						<?php
						} else {
						?>
							<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
						<?php
						}
						?>
						Mengulang hafalan dan ummi.
					</p>
					<hr>
					<p class="card-text">
						Catatan kegiatan sentra :
						<br />
						<?= $aktivitas['catatan_kegiatan']; ?>.
					</p>
					<p class="card-text">
						Catatan guru :
						<br />
						<?= $aktivitas['catatan_guru']; ?>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>