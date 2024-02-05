<?php
echo "<script language=javascript>
function printWindow() {
    bV = parseInt(navigator.appVersion);
    if (bV >= 4) window.print();}
    printWindow();
    </script>"; 
    ?>
    <!-- ======= Section ======= -->
    <section id="about" class="about">
     <div class="container">

        <div class="row flex-lg-row align-items-center">
            <div class="col-lg-10">
                <figure>
                    <blockquote class="blockquote">
                        <p>Monitoring Pembelajaran Al-Qur'an</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Menampilkan data <cite title="Source Title">monitoring pembelajaran Al-Qur'an</cite>
                    </figcaption>
                </figure>
            </div>
        </div><br>
        <table class="table table-striped table-hover">
            <caption>Tabel monitoring pembelajaran Al-Qur'an</caption>
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">Nama Siswa</th>
                    <th rowspan="2" class="text-center">Hafalan Surat</th>
                    <th colspan="2" class="text-center">Ummi</th>
                    <th rowspan="2" class="text-center">Nilai</th>
                </tr>
                <tr>
                    <th class="text-center">Jilid</th>
                    <th class="text-center">Halaman</th>
                </thead>

                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($monitoring as $mnt) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $nomor++ ?></td>
                            <td class="text-center"><?= $mnt['tgl_belajar'] ?></td>
                            <td><?= $mnt['nama_siswa'] ?></td>
                            <td><?= $mnt['hafalan_surat'] ?></td>
                            <td class="text-center"><?= $mnt['ummi_jilid'] ?></td>
                            <td class="text-center"><?= $mnt['ummi_halaman'] ?></td>
                            <td class="text-center"><?= $mnt['nilai'] ?></td>
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
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>