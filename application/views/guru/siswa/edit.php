<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit data siswa</cite>
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
								<input type="number" name="nis" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa" value="<?= $siswa['nis'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nis'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">NISN</label>
							<div class="col">
								<input type="number" name="nisn" class="form-control" id="colFormLabel" placeholder="Nomor induk siswa nasional" value="<?= $siswa['nisn'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nisn'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_siswa" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $siswa['nama_siswa'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Angkatan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="angkatan">
									<?php foreach ($angkatan as $nl) : ?>
										<?php if ($nl['angkatan'] == $siswa['angkatan']) : ?>
											<option value="<?= $nl['angkatan']; ?>" selected><?= $nl['angkatan']; ?></option>
										<?php else : ?>
											<option value="<?= $nl['angkatan']; ?>"><?= $nl['angkatan']; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('angkatan'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama panggilan</label>
							<div class="col">
								<input type="text" name="nama_panggilan_siswa" class="form-control" id="colFormLabel" placeholder="Nama panggilan" value="<?= $siswa['nama_panggilan_siswa'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_panggilan_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jenis kelamin</label>
							<div class="col">
								<input type="text" name="jenis_kelamin_siswa" class="form-control" id="colFormLabel" placeholder="Jenis kelamin" value="<?= $siswa['jenis_kelamin_siswa'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('jenis_kelamin_siswa'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tempat lahir</label>
							<div class="col">
								<input type="text" name="tempat_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tempat lahir" value="<?= $siswa['tempat_lahir_siswa'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('tempat_lahir_siswa'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal lahir</label>
							<div class="col">
								<input type="date" name="tgl_lahir_siswa" class="form-control" id="colFormLabel" placeholder="Tanggal lahir" value="<?= $siswa['tgl_lahir_siswa'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('tgl_lahir_siswa'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_siswa">
									<?php foreach ($status as $st) : ?>
										<?php if ($st == $siswa['status_siswa']) : ?>
											<option value="<?= $st; ?>" selected><?= $st; ?></option>
										<?php else : ?>
											<option value="<?= $st; ?>"><?= $st; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Data Orang Tua</b></label>
						</div>

						<div class="row mb-3 mt-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ayah</label>
							<div class="col">
								<input type="text" name="nama_ayah" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $siswa['nama_ayah'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_ayah'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ayah</label>
							<div class="col">
								<input type="text" name="telp_ayah" class="form-control" id="colFormLabel" placeholder="Nomor telepon ayah" value="<?= $siswa['telp_ayah'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('telp_ayah'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama ibu</label>
							<div class="col">
								<input type="text" name="nama_ibu" class="form-control" id="colFormLabel" placeholder="Nama lengkap" value="<?= $siswa['nama_ibu'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_ibu'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Telepon ibu</label>
							<div class="col">
								<input type="text" name="telp_ibu" class="form-control" id="colFormLabel" placeholder="Nomor telepon ibu" value="<?= $siswa['telp_ibu'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('telp_ibu'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Jln</span>
									</div>
									<input type="text" name="jalan_orang_tua" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $siswa['jalan_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('jalan_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">No</span>
									</div>
									<input type="text" name="no_rumah_orang_tua" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $siswa['no_rumah_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('no_rumah_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">RT</span>
									</div>
									<input type="text" name="rt_orang_tua" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $siswa['rt_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('rt_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">RW</span>
									</div>
									<input type="text" name="rw_orang_tua" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $siswa['rw_orang_tua'] ?>" readonly>
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
									<input type="text" name="kec_orang_tua" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $siswa['kec_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kec_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kab/kota</span>
									</div>
									<input type="text" name="kab_orang_tua" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= $siswa['kab_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kab_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kode pos</span>
									</div>
									<input type="number" name="kode_pos_orang_tua" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $siswa['kode_pos_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('kode_pos_orang_tua'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Akun orang tua</label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Email</span>
									</div>
									<input type="text" name="email_orang_tua" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $siswa['email_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('email_orang_tua'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Password</span>
									</div>
									<input type="password" name="pass_orang_tua" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $siswa['pass_orang_tua'] ?>" readonly>
								</div>
								<small class="form-text text-danger"><?= form_error('pass_orang_tua'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Perbarui Data Siswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>