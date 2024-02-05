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
					<?= form_open_multipart('profile/user_edit'); ?>
					<h5>Data Siswa</h5>
					<div class="row mb-3 mt-3">
						<label for="formFile" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-2">
							<img src="<?= base_url('assets/images/profile/') . $login['foto_siswa']; ?>" class="img-thumbnail">
						</div>
						<div class="col">
							<input class="form-control" type="file" id="formFile" name="foto_siswa">
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">NIS</label>
						<div class="col">
							<input type="number" name="nis" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa" value="<?= $login['nis'] ?>" readonly>
							<small class="form-text text-danger"><?= form_error('nis'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">NISN</label>
						<div class="col">
							<input type="number" name="nisn" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa nasional" value="<?= $login['nisn'] ?>" readonly>
							<small class="form-text text-danger"><?= form_error('nisn'); ?></small>
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
						<div class="col">
							<input type="text" name="nama_siswa" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $login['nama_siswa'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_siswa'); ?></small>
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama panggilan</label>
						<div class="col">
							<input type="text" name="nama_panggilan_siswa" class="form-control" id="colFormLabel" placeholder="Nama panggilan siswa" value="<?= $login['nama_panggilan_siswa'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_panggilan_siswa'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Jenis kelamin</label>
						<div class="col">
							<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jenis_kelamin_siswa">
								<?php foreach ($jk as $jks) : ?>
									<?php if ($jks == $login['jenis_kelamin_siswa']) : ?>
										<option value="<?= $jks; ?>" selected><?= $jks; ?></option>
									<?php else : ?>
										<option value="<?= $jks; ?>"><?= $jks; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Tempat lahir</label>
						<div class="col">
							<input type="text" name="tempat_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tempat lahir" value="<?= $login['tempat_lahir_siswa'] ?>">
							<small class="form-text text-danger"><?= form_error('tempat_lahir_siswa'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal lahir</label>
						<div class="col">
							<input type="date" name="tgl_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tanggal lahir" value="<?= $login['tgl_lahir_siswa'] ?>">
							<small class="form-text text-danger"><?= form_error('tgl_lahir_siswa'); ?></small>
						</div>
					</div>
					<hr>
					<h5>Data Orang Tua</h5>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ayah</label>
						<div class="col">
							<input type="text" name="nama_ayah" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $login['nama_ayah'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_ayah'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ayah</label>
						<div class="col">
							<input type="text" name="telp_ayah" class="form-control" id="colFormLabel" placeholder="Nomor telepon ayah" value="<?= $login['telp_ayah'] ?>">
							<small class="form-text text-danger"><?= form_error('telp_ayah'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ibu</label>
						<div class="col">
							<input type="text" name="nama_ibu" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $login['nama_ibu'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_ibu'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ibu</label>
						<div class="col">
							<input type="text" name="telp_ibu" class="form-control" id="colFormLabel" placeholder="Nomor telepon ibu" value="<?= $login['telp_ibu'] ?>">
							<small class="form-text text-danger"><?= form_error('telp_ibu'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat lengkap</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Jln</span>
								</div>
								<input type="text" name="jalan_orang_tua" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $login['jalan_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('jalan_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">No</span>
								</div>
								<input type="text" name="no_rumah_orang_tua" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $login['no_rumah_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('no_rumah_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RT</span>
								</div>
								<input type="text" name="rt_orang_tua" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $login['rt_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('rt_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RW</span>
								</div>
								<input type="text" name="rw_orang_tua" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $login['rw_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('rw_orang_tua'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kec</span>
								</div>
								<input type="text" name="kec_orang_tua" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $login['kec_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kec_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kab/kota</span>
								</div>
								<input type="text" name="kab_orang_tua" class="form-control" id="colFormLabel" placeholder="kab" value="<?= $login['kab_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kab_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kode pos</span>
								</div>
								<input type="number" name="kode_pos_orang_tua" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $login['kode_pos_orang_tua'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kode_pos_orang_tua'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Akun</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Email</span>
								</div>
								<input type="text" name="email_orang_tua" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $login['email_orang_tua'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('email_orang_tua'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Password</span>
								</div>
								<input type="password" name="pass_orang_tua" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $login['pass_orang_tua'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('pass_orang_tua'); ?></small>
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