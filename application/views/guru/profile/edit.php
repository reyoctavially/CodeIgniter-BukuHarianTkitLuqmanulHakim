<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Edit Profil</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit profil</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<?= form_open_multipart('profile/guru_edit'); ?>
					<div class="row mb-3 mt-3">
						<label for="formFile" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-2">
							<img src="<?= base_url('assets/images/profile/') . $login['foto_guru']; ?>" class="img-thumbnail">
						</div>
						<div class="col">
							<input class="form-control" type="file" id="formFile" name="foto_guru">
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
						<div class="col">
							<input type="text" name="nama_guru" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $login['nama_guru'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_guru'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nip</label>
						<div class="col">
							<input type="number" name="nip" class="form-control" id="colFormLabel" placeholder="Nomor induk guru" value="<?= $login['nip'] ?>" readonly>
							<small class="form-text text-danger"><?= form_error('nip'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
						<div class="col">
							<input type="text" name="telp_guru" class="form-control" id="colFormLabel" placeholder="Nomor telepon" value="<?= $login['telp_guru'] ?>">
							<small class="form-text text-danger"><?= form_error('telp_guru'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat lengkap</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Jln</span>
								</div>
								<input type="text" name="jalan_guru" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $login['jalan_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('jalan_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">No</span>
								</div>
								<input type="text" name="no_rumah_guru" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $login['no_rumah_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('no_rumah_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RT</span>
								</div>
								<input type="text" name="rt_guru" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $login['rt_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('rt_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RW</span>
								</div>
								<input type="text" name="rw_guru" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $login['rw_guru'] ?>">
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
								<input type="text" name="kec_guru" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $login['kec_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kec_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kab/kota</span>
								</div>
								<input type="text" name="kab_guru" class="form-control" id="colFormLabel" placeholder="kab" value="<?= $login['kab_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kab_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kode pos</span>
								</div>
								<input type="number" name="kode_pos_guru" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $login['kode_pos_guru'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kode_pos_guru'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Akun</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Email</span>
								</div>
								<input type="text" name="email_guru" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $login['email_guru'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('email_guru'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Password</span>
								</div>
								<input type="password" name="pass_guru" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $login['pass_guru'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('pass_guru'); ?></small>
						</div>
					</div>
					<div class="d-grid gap-2">
						<button type="submit" name="edit" class="btn btn-success">Perbarui Profil Saya</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>