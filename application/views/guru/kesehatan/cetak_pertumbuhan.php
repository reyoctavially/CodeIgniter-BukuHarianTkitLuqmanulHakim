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
                            <p>Pertumbuhan Siswa</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Menampilkan data <cite title="Source Title">pertumbuhan siswa</cite>
                        </figcaption>
                    </figure>
                </div>
            </div><br>
            <table class="table table-striped table-hover">
                <caption>Tabel pertumbuhan siswa</caption>
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Tinggi Badan</th>
                        <th class="text-center">Berat Badan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($pertumbuhan as $avs) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $nomor++ ?></td>
                            <td class="text-center"><?= $avs['tgl_input'] ?></td>
                            <td><?= $avs['nama_siswa'] ?></td>
                            <td class="text-center"><?= $avs['tinggi_badan_siswa'] ?> cm</td>
                            <td class="text-center"><?= $avs['berat_badan_siswa'] ?> kg</td>
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