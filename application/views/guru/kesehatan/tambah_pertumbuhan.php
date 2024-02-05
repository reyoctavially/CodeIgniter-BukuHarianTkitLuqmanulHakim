<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Pertumbuhan Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data pertumbuhan</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $prn) :
							$split = explode('-', $prn['kode_pertumbuhan']);
							$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
							$code = "PRN-" . $number;
						endforeach;
						?>
						<input type="hidden" name="kode_pertumbuhan" value="<?= $code ?>">
						<input type="hidden" name="nip" value="<?= $login['nip']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col">
								<input type="date" name="tgl_input" class="form-control" id="colFormLabel" value="<?= set_value('tgl_input'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_input'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
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
							<label for="colFormLabel" class="col-sm-2 col-form-label">Yang mengisi</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" value="<?= $login['nama_guru']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Tinggi badan</span>
									</div>
									<input type="number" name="tinggi_badan_siswa" class="form-control" id="colFormLabel" placeholder="cm" value="<?= set_value('tinggi_badan_siswa'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('tinggi_badan_siswa'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Berat badan</span>
									</div>
									<input type="number" name="berat_badan_siswa" class="form-control" id="colFormLabel" placeholder="kg" value="<?= set_value('berat_badan_siswa'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('berat_badan_siswa'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Lingkar kepala</span>
									</div>
									<input type="number" name="lingkar_kepala_siswa" class="form-control" id="colFormLabel" placeholder="cm" value="<?= set_value('lingkar_kepala_siswa'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('lingkar_kepala_siswa'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="exampleFormControlTextarea1">Keterangan kesehatan</label></label>
							<div class="col">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_kesehatan_siswa" value="<?= set_value('ket_kesehatan_siswa'); ?>"></textarea>
								<small class="form-text text-danger"><?= form_error('ket_kesehatan_siswa'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Data Pertumbuhan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>