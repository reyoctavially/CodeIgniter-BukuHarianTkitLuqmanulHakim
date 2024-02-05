<!DOCTYPE html>
<html>

<head>
	<title><?php echo $judul; ?></title>

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">

	<!-- Template Main CSS File -->
	<link href="<?= base_url(); ?>assets/css/stylecustom.css" type="text/css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= base_url(); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>

<body>
	<!-- <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success">
		<div class="container-fluid">
			<a class="navbar-brand mb-0 h1" href="<?= base_url(); ?>adminpanel">
				<b>Buku Penghubung |</b>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>adminpanel">Beranda</a>
					</li>
				</ul>
				<span class="navbar-text">
					<a href="<?= base_url(); ?>profile/admin_index" style="text-decoration: none;"><?= $login['nama_guru'] ?>
						<img src="<?= base_url('assets/images/profile/') . $login['foto_guru']; ?>" alt="" width="25" height="25" class="d-inline-block align-top" style="border-radius: 100%;"></a>
				</span>
			</div>
		</div>
	</nav> -->

	<!-- ======= Top Bar ======= -->
	<section id="topbar" style="background-color: #333352; color:white;" class="d-flex align-items-center">
		<div class="container d-flex justify-content-center justify-content-md-between">
			<div class="contact-info d-flex align-items-center">
				YAYASAN LUQMANUL HAKIM
				<i class="bi bi-phone-fill phone-icon"></i> 022-87501036/0812-2225-9986
			</div>
		</div>
	</section>

	<!-- ======= Header ======= -->
	<header id="header" style="background-color: #3d3d5e; color:white;" class="d-flex align-items-center">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a style="color:white;" href="<?= base_url(); ?>adminpanel">Buku Penghubung</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="<?= base_url(); ?>assets/img/logo.jpg" alt="" class="img-fluid"></a> -->

			<nav id="navbar" class="navbar">
				<ul>
					<li><a style="color:white;" class="nav-link scrollto" href="<?= base_url(); ?>adminpanel">Data Guru</a></li>
					<li><a style="color:white;" class="nav-link scrollto" href="<?= base_url(); ?>adminpanel/upload_jadwal_index">Upload Jadwal</a></li>
					<li><a style="color:white;" class="nav-link scrollto" href="<?= base_url(); ?>adminpanel/upload_doa_index">Upload Doa & Hadits</a></li>
					<li><a style="color:white;" class="nav-link scrollto" href="<?= base_url(); ?>adminpanel/upload_kurikulum_index">Upload Kurikulum</a></li>
					<li>
						<span class="navbar-text">
							<a style="color:white;" class="nav-link scrollto fw-bold" href="<?= base_url(); ?>profile/admin_index" style="text-decoration: none;"><?= $login['nama_guru'] ?>
								<img src="<?= base_url('assets/images/profile/') . $login['foto_guru']; ?>" alt="" width="25" height="25" class="d-inline-block align-top" style="border-radius: 100%; margin-left: 2px;"></a>
						</span>
					</li>
					<!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->