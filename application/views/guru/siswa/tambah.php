<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data siswa</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<div class="row mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Siswa</b></label>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">NIS</label>
							<div class="col">
								<input type="number" name="nis" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa" value="<?= set_value('nis'); ?>">
								<small class="form-text text-danger"><?= form_error('nis'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">NISN</label>
							<div class="col">
								<input type="number" name="nisn" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa nasional" value="<?= set_value('nisn'); ?>">
								<small class="form-text text-danger"><?= form_error('nisn'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_siswa" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= set_value('nama_siswa'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Angkatan</label>
							<div class="col">
								<select class="form-select angkatan" aria-label="Default select example" id="colFormLabel" name="angkatan">
									<?php foreach ($angkatan as $sw) : ?>
										<option value="<?= $sw['angkatan']; ?>"><?= $sw['angkatan']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama panggilan</label>
							<div class="col">
								<input type="text" name="nama_panggilan_siswa" class="form-control" id="colFormLabel" placeholder="Nama panggilan" value="<?= set_value('nama_panggilan_siswa'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_panggilan_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jenis kelamin</label>
							<div class="col">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin_siswa" id="inlineRadio1" value="Laki-laki" checked>
									<label class="form-check-label" for="inlineRadio1">Laki-laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin_siswa" id="inlineRadio1" value="Perempuan">
									<label class="form-check-label" for="inlineRadio1">Perempuan</label>
								</div>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tempat lahir</label>
							<div class="col">
								<input type="text" name="tempat_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tempat lahir" value="<?= set_value('tempat_lahir_siswa'); ?>">
								<small class="form-text text-danger"><?= form_error('tempat_lahir_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal lahir</label>
							<div class="col">
								<input type="date" name="tgl_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tanggal lahir" value="<?= set_value('tgl_lahir_siswa'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_lahir_siswa'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_siswa">
									<?php foreach ($status as $st) : ?>
										<option value="<?= $st; ?>"><?= $st; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Orang Tua</b></label>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ayah</label>
							<div class="col">
								<input type="text" name="nama_ayah" class="form-control" id="colFormLabel" placeholder="Nama ayah" value="<?= set_value('nama_ayah'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_ayah'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ayah</label>
							<div class="col">
								<input type="text" name="telp_ayah" class="form-control" id="colFormLabel" placeholder="Nomor telpon ayah" value="<?= set_value('telp_ayah'); ?>">
								<small class="form-text text-danger"><?= form_error('telp_ayah'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ibu</label>
							<div class="col">
								<input type="text" name="nama_ibu" class="form-control" id="colFormLabel" placeholder="Nama ibu" value="<?= set_value('nama_ibu'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_ibu'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ibu</label>
							<div class="col">
								<input type="text" name="telp_ibu" class="form-control" id="colFormLabel" placeholder="Nomor telpon ibu" value="<?= set_value('telp_ibu'); ?>">
								<small class="form-text text-danger"><?= form_error('telp_ibu'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat orang tua</label>
							<div class="col">
								<input type="text" name="jalan_orang_tua" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= set_value('jalan_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('jalan_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="no_rumah_orang_tua" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= set_value('no_rumah_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('no_rumah_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rt_orang_tua" class="form-control" id="colFormLabel" placeholder="RT" value="<?= set_value('rt_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('rt_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rw_orang_tua" class="form-control" id="colFormLabel" placeholder="RW" value="<?= set_value('rw_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('rw_orang_tua'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<input type="text" name="kec_orang_tua" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= set_value('kec_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('kec_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="kab_orang_tua" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= set_value('kab_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('kab_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="kode_pos_orang_tua" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= set_value('kode_pos_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('kode_pos_orang_tua'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Akun orang tua</label>
							<div class="col">
								<input type="email" name="email_orang_tua" class="form-control" id="colFormLabel" placeholder="Alamat email" value="<?= set_value('email_orang_tua'); ?>">
								<small class="form-text text-danger"><?= form_error('email_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_orang_tua" class="form-control" id="colFormLabel" placeholder="Kata sandi">
								<small class="form-text text-danger"><?= form_error('pass_orang_tua'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_orang_tua2" class="form-control" id="colFormLabel" placeholder="Ulangi kata sandi">
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Data Siswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var map = {};
	$('select option').each(function() {
		if (map[this.value]) {
			$(this).remove()
		}
		map[this.value] = true;
	})
</script>