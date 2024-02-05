<main class="form-signin">
	<form method="POST" action="<?= base_url('admin') ?>">
		<img src="<?= base_url(); ?>assets/images/icon.png" alt="" width="80" height="100">
		<h1 class="h3 mb-3 fw-normal">Halaman Login</h1>

		<?= $this->session->flashdata('message'); ?>

		<div class="form-group">
			<label for="inputUsername" class="visually-hidden">Email</label>
			<input type="email" id="inputUsername" name="email_guru" class="form-control" placeholder="Email" value="<?= set_value('email_guru') ?>" required>
			<small class="form-text text-danger"><?= form_error('email_guru'); ?></small>
		</div>

		<div class="form-group">
			<label for="inputPassword" class="visually-hidden">Password</label>
			<input type="password" id="inputPassword" name="pass_guru" class="form-control" placeholder="Kata sandi" required="">
			<small class="form-text text-danger"><?= form_error('pass_guru'); ?></small>
		</div>
		<button type="submit" class="btn btn-success" style="width: 100%;">Login</button>
	</form>

	<hr>
	<a class="small text-success" style="text-decoration: none;" href="<?= base_url('admin/forgotPassword') ?>">Lupa kata sandi?</a>
	<p class="mt-3 mb-3 text-muted">&copy Buku Penghubung </br> Yayasan Luqmanul Hakim | 2021</p>
</main>
</body>

</html>