<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Guru</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit data guru</cite>
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
								<input type="number" name="nip" class="form-control" id="colFormLabel" placeholder="Nomor induk pegawai" value="<?= $guru['nip'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nip'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_guru">
									<?php foreach ($status as $st) : ?>
										<?php if ($st == $guru['status_guru']) : ?>
											<option value="<?= $st; ?>" selected><?= $st; ?></option>
										<?php else : ?>
											<option value="<?= $st; ?>"><?= $st; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $guru['nama_guru'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_guru'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="text" name="telp_guru" class="form-control" id="colFormLabel" placeholder="Nomor telpon guru" value="<?= $guru['telp_guru'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('telp_guru'); ?></small>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Alamat</b></label>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Jln</span>
									</div>
									<input type="text" name="jalan_guru" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $guru['jalan_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('jalan_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">No</span>
									</div>
									<input type="text" name="no_rumah_guru" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $guru['no_rumah_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('no_rumah_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">RT</span>
									</div>
									<input type="text" name="rt_guru" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $guru['rt_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('rt_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">RW</span>
									</div>
									<input type="text" name="rw_guru" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $guru['rw_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('rw_guru'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kec</span>
									</div>
									<input type="text" name="kec_guru" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $guru['kec_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kec_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kab/kota</span>
									</div>
									<input type="text" name="kab_guru" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= $guru['kab_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kab_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kode pos</span>
									</div>
									<input type="number" name="kode_pos_guru" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $guru['kode_pos_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kode_pos_guru'); ?></small>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Akun</b></label>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat Email dan Password</label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Email</span>
									</div>
									<input type="text" name="email_guru" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $guru['email_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('email_guru'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Password</span>
									</div>
									<input type="password" name="pass_guru" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $guru['pass_guru'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('pass_guru'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Perbarui Data Guru</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>