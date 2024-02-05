<div class="container" style="margin-top: 50px">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<img src="<?= base_url(); ?>assets/icon/edit.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
							<p>Data Pertumbuhan Siswa</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit data pertumbuhan</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<input type="hidden" name="kode_pertumbuhan" value="<?= $pertumbuhan['kode_pertumbuhan']; ?>">
						<input type="hidden" name="nis" value="<?= $pertumbuhan['nis']; ?>">
						<input type="hidden" name="nip" value="<?= $pertumbuhan['nip']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama siswa</label>
							<div class="col">
								<input type="rext" name="nama_siswa" class="form-control" id="colFormLabel" value="<?= $pertumbuhan['nama_siswa']; ?>" readonly>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Yang mengisi</label>
							<div class="col">
								<input type="text" name="nama_guru" class="form-control" id="colFormLabel" value="<?= $pertumbuhan['nama_guru']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Tinggi badan</span>
									</div>
									<input type="number" name="tinggi_badan_siswa" class="form-control" id="colFormLabel" placeholder="cm" value="<?= $pertumbuhan['tinggi_badan_siswa']; ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('tinggi_badan_siswa'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Berat badan</span>
									</div>
									<input type="number" name="berat_badan_siswa" class="form-control" id="colFormLabel" placeholder="kg" value="<?= $pertumbuhan['berat_badan_siswa']; ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('berat_badan_siswa'); ?></small>
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Lingkar kepala</span>
									</div>
									<input type="number" name="lingkar_kepala_siswa" class="form-control" id="colFormLabel" placeholder="cm" value="<?= $pertumbuhan['lingkar_kepala_siswa']; ?>">
								</div>
								<small class="form-text text-danger"><?= form_error('lingkar_kepala_siswa'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col">
								<input type="rext" name="ket_kesehatan_siswa" class="form-control" id="colFormLabel" value="<?= $pertumbuhan['ket_kesehatan_siswa']; ?>">
								<small class="form-text text-danger"><?= form_error('ket_kesehatan_siswa'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-success">Perbarui Data Pertumbuhan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>