<div class="container" style="margin-top: 50px">
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
							Menampilkan proses <cite title="Source Title">tambah aktivitas siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $ks) :
							$split = explode('-', $ks['kode_aktivitas_siswa']);
							$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
							$code = "AV-" . $number;
						endforeach;
						?>
						<input type="hidden" name="kode_aktivitas_siswa" value="<?= $code ?>">
						<input type="hidden" name="nis" value="<?= $aktivitas['nis']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal aktivitas</label>
							<div class="col">
								<input type="date" name="tgl_aktivitas" class="form-control" id="colFormLabel" value="<?= set_value('tgl_aktivitas'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_aktivitas'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama siswa</label>
							<div class="col">
								<input type="text" name="nama_siswa" class="form-control" id="colFormLabel" value="<?= $aktivitas['nama_siswa']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jam bangun</label>
							<div class="col">
								<input type="time" name="jam_bangun" class="form-control" id="colFormLabel" value="<?= set_value('jam_bangun'); ?>">
								<small class="form-text text-danger"><?= form_error('jam_bangun'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jam tidur</label>
							<div class="col">
								<input type="time" name="jam_tidur" class="form-control" id="colFormLabel" value="<?= set_value('jam_tidur'); ?>">
								<small class="form-text text-danger"><?= form_error('jam_tidur'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Pembiasaan sholat</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="pembiasaan_sholat" id="inlineRadio1" value="0" checked>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="pembiasaan_sholat" id="inlineRadio1" value="1">
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Membaca doa harian</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="membaca_doa_harian" id="inlineRadio1" value="0" checked>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="membaca_doa_harian" id="inlineRadio1" value="1">
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Mengulang hafalan dan ummi</label>
							<div class="col">
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="mengulang_hafalan_dan_ummi" id="inlineRadio1" value="0" checked>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="mengulang_hafalan_dan_ummi" id="inlineRadio1" value="1">
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label for="exampleFormControlTextarea1">Catatan kegiatan sentra</label></label>
							<div class="col">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan_kegiatan" value="<?= set_value('catatan_kegiatan'); ?>"></textarea>
								<small class="form-text text-danger"><?= form_error('catatan_kegiatan'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Aktivitas Siswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>