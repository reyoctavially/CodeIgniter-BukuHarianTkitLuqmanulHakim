<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Aktivitas</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah catatan aktivitas siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<input type="hidden" name="kode_aktivitas_siswa" value="<?= $aktivitas['kode_aktivitas_siswa'] ?>">
						<input type="hidden" name="nis" value="<?= $aktivitas['nis']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama siswa</label>
							<div class="col">
								<input type="rext" name="nama_siswa" class="form-control" id="colFormLabel" value="<?= $aktivitas['nama_siswa']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jam bangun</label>
							<div class="col">
								<input type="time" name="jam_bangun" class="form-control" id="colFormLabel" value="<?= $aktivitas['jam_bangun']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('jam_bangun'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jam tidur</label>
							<div class="col">
								<input type="time" name="jam_tidur" class="form-control" id="colFormLabel" value="<?= $aktivitas['jam_tidur']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('jam_tidur'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Kegiatan</label>
							<div class="col">
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
								Pembiasaan Sholat
							</div>
							<div class="col">
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
								Membaca doa harian
							</div>
							<div class="col">
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
								Mengulang hafalan dan ummi
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Catatan kegiatan sentra</label>
							<div class="col">
								<input type="text" name="catatan_kegiatan" class="form-control" id="colFormLabel" value="<?= $aktivitas['catatan_kegiatan']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('catatan_kegiatan'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="exampleFormControlTextarea1">Catatan guru</label></label>
							<div class="col">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan_guru" value="<?= set_value('catatan_guru'); ?>"></textarea>
								<small class="form-text text-danger"><?= form_error('catatan_guru'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Catatan Aktivitas Siswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>