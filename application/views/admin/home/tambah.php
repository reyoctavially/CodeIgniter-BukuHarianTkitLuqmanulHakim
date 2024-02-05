<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Guru</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data guru</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<div class="row mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Guru</b></label>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">NIP</label>
							<div class="col">
								<input type="number" name="nip" class="form-control" id="colFormLabel" placeholder="Nomor induk pegawai" value="<?= set_value('nis'); ?>">
								<small class="form-text text-danger"><?= form_error('nip'); ?></small>
							</div>

						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_guru">
									<?php foreach ($status as $st) : ?>
										<option value="<?= $st; ?>"><?= $st; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= set_value('nama_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_guru'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="text" name="telp_guru" class="form-control" id="colFormLabel" placeholder="Nomor telpon guru" value="<?= set_value('telp_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('telp_guru'); ?></small>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Alamat</b></label>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat Guru</label>
							<div class="col">
								<input type="text" name="jalan_guru" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= set_value('jalan_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('jalan_guru'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="no_rumah_guru" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= set_value('no_rumah_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('no_rumah_guru'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rt_guru" class="form-control" id="colFormLabel" placeholder="RT" value="<?= set_value('rt_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('rt_guru'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rw_guru" class="form-control" id="colFormLabel" placeholder="RW" value="<?= set_value('rw_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('rw_guru'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<input type="text" name="kec_guru" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= set_value('kec_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('kec_guru'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="kab_guru" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= set_value('kab_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('kab_guru'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="kode_pos_guru" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= set_value('kode_pos_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('kode_pos_guru'); ?></small>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Akun</b></label>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat email guru</label>
							<div class="col">
								<input type="email" name="email_guru" class="form-control" id="colFormLabel" placeholder="Alamat email" value="<?= set_value('email_guru'); ?>">
								<small class="form-text text-danger"><?= form_error('email_guru'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
							<div class="col">
								<input type="password" name="pass_guru" class="form-control" id="colFormLabel" placeholder="Kata sandi">
								<small class="form-text text-danger"><?= form_error('pass_guru'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_guru2" class="form-control" id="colFormLabel" placeholder="Ulangi kata sandi">
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Data Guru</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>