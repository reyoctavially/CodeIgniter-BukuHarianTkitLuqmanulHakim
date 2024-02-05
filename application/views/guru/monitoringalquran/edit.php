<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Monitoring Al-Qur'an</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit monitoring Al-Qur'an</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<input type="hidden" name="kode_pembelajaran_alquran" value="<?= $monitoring['kode_pembelajaran_alquran'] ?>">
						<input type="hidden" name="nis" value="<?= $monitoring['nis']; ?>">
						<input type="hidden" name="nip" value="<?= $monitoring['nip']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nilai</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="nilai">
									<?php foreach ($nilai as $nl) : ?>
										<?php if ($nl['nilai'] == $monitoring['nilai']) : ?>
											<option value="<?= $nl['nilai']; ?>" selected><?= $nl['nilai']; ?></option>
										<?php else : ?>
											<option value="<?= $nl['nilai']; ?>"><?= $nl['nilai']; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('nilai'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama siswa</label>
							<div class="col">
								<input type="rext" name="nama_siswa" class="form-control" id="colFormLabel" value="<?= $monitoring['nama_siswa']; ?>" readonly>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Yang menilai</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" value="<?= $monitoring['nama_guru']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Hafalan surat</label>
							<div class="col">
								<input type="text" name="hafalan_surat" class="form-control" id="colFormLabel" placeholder="Nama surat" value="<?= $monitoring['hafalan_surat']; ?>">
								<small class="form-text text-danger"><?= form_error('hafalan_surat'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Murajaah Hafalan</label>
							<div class="col">
								<input type="text" name="murajaah_hafalan" class="form-control" id="colFormLabel" placeholder="Nama surat" value="<?= $monitoring['murajaah_hafalan']; ?>">
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
									<input type="number" name="ummi_jilid" class="form-control" id="colFormLabel" placeholder="Jilid ummi" value="<?= $monitoring['ummi_jilid']; ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ummi_jilid'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Halaman</span>
									</div>
									<input type="number" name="ummi_halaman" class="form-control" id="colFormLabel" placeholder="Halaman ummi" value="<?= $monitoring['ummi_halaman']; ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ummi_halaman'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col">
								<input type="text" name="keterangan" class="form-control" id="colFormLabel" value="<?= $monitoring['keterangan']; ?>">
								<small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Perbarui Monitoring Al-Qur'an</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>