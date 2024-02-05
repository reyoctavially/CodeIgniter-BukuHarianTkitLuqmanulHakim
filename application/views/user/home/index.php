<section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

		<div class="carousel-inner" role="listbox">

			<!-- Slide 1 -->
			<div class="carousel-item active" alt="Photo by Adnan Uddin from Pexels" style="background-image: url(<?= base_url(); ?>assets/img/slide/kolase-bg-1.jpg)">
				<div class="carousel-container">
					<div class="container">
						<h2 class="animate__animated animate__fadeInDown">Selamat datang Bpk/Ibu user di Buku Penghubung</h2>
						<p class="animate__animated animate__fadeInUp">Taman Kanak-kanak Islam Terpadu Luqmanul Hakim.</p>
						<a href="<?= base_url(); ?>petunjuk/user_index" class="btn-get-started animate__animated animate__fadeInUp scrollto">Petunjuk Pengisian dan Tata Tertib</a>
					</div>
				</div>
			</div>

			<!-- Slide 2 -->
			<div class="carousel-item" alt="Photo by Pavlo Luchkovski from Pexels" style="background-image: url(<?= base_url(); ?>assets/img/slide/pexels-pavlo-luchkovski-337897.jpg)">
				<div class="carousel-container">
					<div class="container">
						<h2 class="animate__animated animate__fadeInDown">Taman Kanak-kanak Islam Terpadu Luqmanul Hakim</h2>
						<p class="animate__animated animate__fadeInUp">Selamat datang di website kami.</p>
						<!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
					</div>
				</div>
			</div>

			<!-- Slide 3 -->
			<div class="carousel-item" alt="Photo by Ahmet Polat from Pexels" style="background-image: url(<?= base_url(); ?>assets/img/slide/kolase-bg-2.jpg)">
				<div class="carousel-container">
					<div class="container">
						<h2 class="animate__animated animate__fadeInDown">Kolase Kegiatan Anak</h2>
						<p class="animate__animated animate__fadeInUp">Foto-foto anak dari Taman Kanak-kanak Islam Terpadu Luqmanul Hakim.</p>
						<!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
					</div>
				</div>
			</div>

		</div>

		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>

		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>

	</div>
</section><!-- End Hero -->

<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
		<div class="container" style="margin-top: 50px">

			<div class="row justify-content-md-center">
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>aktivitas/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/aktivitas.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Aktivitas Siswa</h5>
								<p class="card-text">Mencatat dan melihat aktivitas siswa.</p>
								<!-- <a href="<?= base_url(); ?>aktivitas/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>monitoring/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/quran.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Pembelajaran Al-Quran</h5>
								<p class="card-text">Mencaatat dan monitoring pembelajaran Al-Quran.</p>
								<!-- <a href="<?= base_url(); ?>monitoring/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>kesehatan/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/kesehatan.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Catatan Kesehatan</h5>
								<p class="card-text">Mencatat dan melihat data kesehatan.</p>
								<!-- <a href="<?= base_url(); ?>kesehatan/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>jadwal/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/kbm.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Jadwal Kegiatan Belajar</h5>
								<p class="card-text">Melihat jadwal kegiatan belajar mengajar.</p>
								<!-- <a href="<?= base_url(); ?>jadwal/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>doa/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/doa.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Doa dan Hadits</h5>
								<p class="card-text">Membaca berbagai macam doa dan hadits.</p>
								<!-- <a href="<?= base_url(); ?>doa/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-auto">
					<a href="<?= base_url(); ?>kurikulum/user_index">
						<div class="card border-success" style="width: 18rem; margin: 10px; box-shadow: 2px 2px 2px 2px grey;">
							<img src="<?= base_url(); ?>assets/images/kurikulum.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Materi Kurikulum</h5>
								<p class="card-text">Melihat materi kurikulum yayasan Luqmanul Hakim.</p>
								<!-- <a href="<?= base_url(); ?>kurikulum/user_index" class="btn btn-success float-end">Lanjutkan</a> -->
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	</section><!-- End Services Section -->