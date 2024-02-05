<main class="form-signin">
	<form method="POST" action="<?= base_url('admin/forgotPassword') ?>">
		<img src="<?= base_url(); ?>assets/images/icon.png" alt="" width="80" height="100">
		<h1 class="h3 mb-3 fw-normal">Lupa Kata Sandi?</h1>

		<?= $this->session->flashdata('message'); ?>

		<div class="form-group">
			<label for="inputUsername" class="visually-hidden">Email</label>
			<input type="email" id="inputUsername" name="email_guru" class="form-control" placeholder="Email" value="<?= set_value('email_guru') ?>" required>
			<small class="form-text text-danger"><?= form_error('email_guru'); ?></small>
		</div>
		<button type="submit" class="btn btn-success mt-2" style="width: 100%;">Reset Kata Sandi</button>
	</form>

	<hr>
	<a class="small text-success" style="text-decoration: none;" href="<?= base_url('admin') ?>">Kembali ke login!</a>
	<p class="mt-3 mb-3 text-muted">&copy Buku Penghubung </br> Yayasan Luqmanul Hakim | 2021</p>
</main>
</body>

</html>