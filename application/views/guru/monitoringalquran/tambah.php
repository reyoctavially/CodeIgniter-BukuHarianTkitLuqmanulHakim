<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Monitoring Al-Qur'an</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah monitoring Al-Qur'an</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $qrn) :
							$split = explode('-', $qrn['kode_pembelajaran_alquran']);
							$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
							$code = "QRN-" . $number;
						endforeach;
						?>
						<input type="hidden" name="kode_pembelajaran_alquran" value="<?= $code ?>">
						<input type="hidden" name="nip" value="<?= $login['nip']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col">
								<input type="date" name="tgl_belajar" class="form-control" id="colFormLabel" value="<?= set_value('tgl_belajar'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_belajar'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nilai</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="nilai">
									<?php foreach ($nilai as $nl) : ?>
										<option value="<?= $nl; ?>"><?= $nl; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama siswa</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="nis">
									<?php foreach ($siswa as $sw) : ?>
										<option value="<?= $sw['nis']; ?>"><?= $sw['nama_siswa']; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('nis'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Yang menilai</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" value="<?= $login['nama_guru']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Hafalan surat</label>
							<div class="col">
								<input type="text" name="hafalan_surat" class="form-control" id="colFormLabel" placeholder="Nama surat" value="<?= set_value('hafalan_surat'); ?>">
								<small class="form-text text-danger"><?= form_error('hafalan_surat'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Murajaah Hafalan</label>
							<div class="col">
								<input type="text" name="murajaah_hafalan" class="form-control" id="colFormLabel" placeholder="Nama surat" value="<?= set_value('murajaah_hafalan'); ?>">
								<small class="form-text text-danger"><?= form_error('murajaah_hafalan'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Ummi</label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Jilid</span>
									</div>
									<input type="number" name="ummi_jilid" class="form-control" id="colFormLabel" placeholder="Jilid ummi" value="<?= set_value('ummi_jilid'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ummi_jilid'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Halaman</span>
									</div>
									<input type="number" name="ummi_halaman" class="form-control" id="colFormLabel" placeholder="Halaman ummi" value="<?= set_value('ummi_halaman'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ummi_halaman'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="exampleFormControlTextarea1">Keterangan</label></label>
							<div class="col">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan" value="<?= set_value('keterangan'); ?>"></textarea>
								<small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Monitoring Al-Qur'an</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>