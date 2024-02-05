<main class="form-signin">
	<form method="POST" action="<?= base_url('auth/changePassword') ?>">
		<img src="<?= base_url(); ?>assets/images/icon.png" alt="" width="80" height="100">
		<h1 class="h3 fw-normal">Reset kata sandi untuk</h1>
		<h1 class="h5 mb-3 fw-normal"><?= $this->session->userdata('reset_email') ?></h1>

		<?= $this->session->flashdata('message'); ?>

		<div class="form-group">
			<label for="sandi_baru" class="visually-hidden">Kata Sandi Baru</label>
			<input type="password" id="sandi_baru" name="sandi_baru" class="form-control" placeholder="Masukkan kata sandi baru" required>
			<small class="form-text text-danger"><?= form_error('sandi_baru'); ?></small>
		</div>
		
		<div class="form-group">
			<label for="sandi_baru_ulang" class="visually-hidden">Ulangi Kata Sandi</label>
			<input type="password" id="sandi_baru_ulang" name="sandi_baru_ulang" class="form-control" placeholder="Ulangi kata sandi" required>
			<small class="form-text text-danger"><?= form_error('sandi_baru_ulang'); ?></small>
		</div>
		<button type="submit" class="btn btn-success" style="width: 100%;">Ganti Kata Sandi</button>
	</form>

	<hr>
	<a class="small text-success" style="text-decoration: none;" href="<?= base_url('auth') ?>">Kembali ke login!</a>
	<p class="mt-3 mb-3 text-muted">&copy Buku Penghubung </br> Yayasan Luqmanul Hakim | 2021</p>
</main>
</body>
</html>