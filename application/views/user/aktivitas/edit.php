<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Aktivitas</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit aktivitas siswa</cite>
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
								<input type="time" name="jam_bangun" class="form-control" id="colFormLabel" value="<?= $aktivitas['jam_bangun']; ?>">
								<small class="form-text text-danger"><?= form_error('jam_bangun'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jam tidur</label>
							<div class="col">
								<input type="time" name="jam_tidur" class="form-control" id="colFormLabel" value="<?= $aktivitas['jam_tidur']; ?>">
								<small class="form-text text-danger"><?= form_error('jam_tidur'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Pembiasaan sholat</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="pembiasaan_sholat" id="inlineRadio1" value="0" <?php if ($aktivitas['pembiasaan_sholat'] == '0') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="pembiasaan_sholat" id="inlineRadio1" value="1" <?php if ($aktivitas['pembiasaan_sholat'] == '1') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Membaca doa harian</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="membaca_doa_harian" id="inlineRadio1" value="0" <?php if ($aktivitas['membaca_doa_harian'] == '0') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="membaca_doa_harian" id="inlineRadio1" value="1" <?php if ($aktivitas['membaca_doa_harian'] == '1') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Mengulang hafalan dan ummi</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="mengulang_hafalan_dan_ummi" id="inlineRadio1" value="0" <?php if ($aktivitas['mengulang_hafalan_dan_ummi'] == '0') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="mengulang_hafalan_dan_ummi" id="inlineRadio1" value="1" <?php if ($aktivitas['mengulang_hafalan_dan_ummi'] == '1') echo 'checked' ?>>
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Catatan kegiatan sentra</label>
							<div class="col">
								<input type="text" name="catatan_kegiatan" class="form-control" id="colFormLabel" value="<?= $aktivitas['catatan_kegiatan']; ?>">
								<small class="form-text text-danger"><?= form_error('catatan_kegiatan'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Perbarui Aktivitas Siswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>