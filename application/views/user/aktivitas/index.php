<!-- ======= Section ======= -->
<section id="about" class="about">
	<div class="container">

		<?php
		if ($this->session->flashdata('flash') ) :
			?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Selamat anda <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php
		if ($this->session->flashdata('flash2') ) :
			?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Maaf anda <strong>sudah</strong> <?= $this->session->flashdata('flash2'); ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row flex-lg-row align-items-center">
			<div class="col-5 col-sm-3 col-lg-2">
				<img src="<?= base_url(); ?>assets/images/bocil1.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
			</div>
			<div class="col-lg-10">
				<figure>
					<blockquote class="blockquote">
						<p>Catatan Aktivitas Siswa</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">aktivitas siswa dirumah</cite>
					</figcaption>
				</figure>

				<?php
				if ($login['status_siswa'] == "Nonaktif") {
					?>
					<a href="<?= base_url(); ?>aktivitas/user_tambah_aktivitas" class="btn btn-success disabled">Tambah Aktivitas Siswa</a>
					<?php
				} else {
					?>
					<a href="<?= base_url(); ?>aktivitas/user_tambah" class="btn btn-success">Tambah Aktivitas Siswa</a>
					<?php
				} 
				?>
			</div>
		</div><br>
		<table id="aktivitas" class="display">
			<caption>Tabel catatan aktivitas siswa</caption>
			<thead>
				<tr>
					<th></th>
					<th class="text-center">No</th>
					<th class="text-center">Tanggal</th>
					<th class="text-center">Nama Siswa</th>
					<th class="text-center">Sholat</th>
					<th class="text-center">Doa Harian</th>
					<th class="text-center">Hafalan & Ummi</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$nomor = 1;
				foreach ($aktivitas as $avs) :
					?>
					<tr>
						<td class="dt-control"></td>
						<td class="text-center"><?= $nomor++ ?></td>
						<td class="text-center"><?= $avs['tgl_aktivitas'] ?></td>
						<td><?= $avs['nama_siswa'] ?></td>
						<td class="text-center">
							<?php
							$sholat = $avs['pembiasaan_sholat'];
							if($sholat == 1){
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<td class="text-center">
							<?php
							$doa = $avs['membaca_doa_harian'];
							if($doa == 1){
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<td class="text-center">
							<?php
							$hafalan = $avs['mengulang_hafalan_dan_ummi'];
							if($hafalan == 1){
								?>
								<img src="<?= base_url(); ?>assets/icon/checked.png" style="width: 25px; height: 25px;">
								<?php
							} else {
								?>
								<img src="<?= base_url(); ?>assets/icon/cancel.png" style="width: 25px; height: 25px;">
								<?php
							}
							?>
						</td>
						<td class="text-center">
							<a class="btn btn-success float-end m-1" href="<?= base_url(); ?>aktivitas/user_detail/<?= $avs['kode_aktivitas_siswa']; ?>">Rincian</a>
							<a class="btn btn-primary float-end m-1" href="<?= base_url(); ?>aktivitas/user_edit/<?= $avs['kode_aktivitas_siswa']; ?>">Edit</a>
						</td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>


	</div>
</section><!-- End Section -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

<script>
	function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
         	'<td>Jam bangun</td>'+
            '<td>: '+d.name+'</td>'+
            '<td>Catatan kegiatan sentra</td>'+
            '<td>: '+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
        	'<td>Jam tidur</td>'+
            '<td>: '+d.name+'</td>'+
            '<td>Catatan guru</td>'+
            '<td>: '+d.extn+'</td>'+
        '</tr>'+
    '</table>';
}

	$(document).ready(function() {
		var table = $('#aktivitas').DataTable();
		var detailRows = [];
		$('#aktivitas tbody').on('click', 'td.dt-control', function () {
			var tr = $(this).closest('tr');
			var row = table.row( tr );

			if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
	});
</script>