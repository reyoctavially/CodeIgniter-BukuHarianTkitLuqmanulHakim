<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/add.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Perkembangan Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data perkembangan</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $prn) :
							$split = explode('-', $prn['kode_pemeriksaan']);
							$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
							$code = "PMN-" . $number;
						endforeach;
						?>
						<input type="hidden" name="kode_pemeriksaan" value="<?= $code ?>">
						<input type="hidden" name="nip" value="<?= $login['nip'] ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col">
								<input type="date" name="tgl_pemeriksaan" class="form-control" id="colFormLabel" value="<?= set_value('tgl_pemeriksaan'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_pemeriksaan'); ?></small>
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
							<label for="colFormLabel" class="col-sm-2 col-form-label">Semester</label>
							<div class="col">
								<input type="number" name="semester" class="form-control" id="colFormLabel" value="<?= set_value('semester'); ?>">
								<small class="form-text text-danger"><?= form_error('semester'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Usia pemeriksaan</label>
							<div class="col">
								<input type="number" name="usia_pemeriksaan" class="form-control" id="colFormLabel" value="<?= set_value('usia_pemeriksaan'); ?>">
								<small class="form-text text-danger"><?= form_error('usia_pemeriksaan'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Tinggi badan</span>
									</div>
									<input type="number" name="tinggi_badan" class="form-control" id="colFormLabel" placeholder="cm" value="<?= set_value('tinggi_badan'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('tinggi_badan'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Berat badan</span>
									</div>
									<input type="number" name="berat_badan" class="form-control" id="colFormLabel" placeholder="kg" value="<?= set_value('berat_badan'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('berat_badan'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Lingkar kepala</span>
									</div>
									<input type="number" name="lingkar_kepala" class="form-control" id="colFormLabel" placeholder="cm" value="<?= set_value('lingkar_kepala'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('lingkar_kepala'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Daya lihat</span>
									</div>
									<input type="text" name="daya_lihat" class="form-control" id="colFormLabel" placeholder="Daya lihat" value="<?= set_value('daya_lihat'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('daya_lihat'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Kuku</span>
									</div>
									<input type="text" name="ket_kuku" class="form-control" id="colFormLabel" placeholder="Keterangan kuku" value="<?= set_value('ket_kuku'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ket_kuku'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Daya dengar</span>
									</div>
									<input type="text" name="daya_dengar" class="form-control" id="colFormLabel" placeholder="Daya dengar" value="<?= set_value('daya_dengar'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('daya_dengar'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rambut</span>
									</div>
									<input type="text" name="ket_rambut" class="form-control" id="colFormLabel" placeholder="Keterangan rambut" value="<?= set_value('ket_rambut'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ket_rambut'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Gigi</span>
									</div>
									<input type="text" name="ket_gigi" class="form-control" id="colFormLabel" placeholder="Keterangan gigi" value="<?= set_value('ket_gigi'); ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('ket_gigi'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="exampleFormControlTextarea1">Catatan perkembangan</label></label>
							<div class="col">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="perkembangan_anak" value="<?= set_value('perkembangan_anak'); ?>"></textarea>
								<small class="form-text text-danger"><?= form_error('perkembangan_anak'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Simpan Data Perkembangan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>