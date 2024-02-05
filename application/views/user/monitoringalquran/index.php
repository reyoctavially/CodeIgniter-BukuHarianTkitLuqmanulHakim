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
            <img src="<?= base_url(); ?>assets/images/bocil2.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
        </div>
        <div class="col-lg-10">
            <figure>
                <blockquote class="blockquote">
                    <p>Monitoring Pembelajaran Al-Qur'an</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Menampilkan data <cite title="Source Title">monitoring pembelajaran Al-Qur'an</cite>
                </figcaption>
            </figure>
            <a href="<?= base_url(); ?>monitoring/lihat_nilai" class="btn btn-primary">Lihat Konversi Nilai</a>
        </div>
    </div><br>
    <table id="monitoring" class="table table-striped table-hover">
        <caption>Tabel monitoring pembelajaran Al-Qur'an</caption>
        <thead>
            <tr>
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Tanggal</th>
                <th rowspan="2" class="text-center">Nama Siswa</th>
                <th rowspan="2" class="text-center">Hafalan Surat</th>
                <th colspan="2" class="text-center">Ummi</th>
                <th rowspan="2" class="text-center">Nilai</th>
                <th rowspan="2" class="text-center">Opsi</th>
                <th rowspan="2" class="text-center"> </th>
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
                        <td class="text-center">
                            <a class="btn btn-success float-end m-1" href="<?= base_url(); ?>monitoring/user_detail/<?= $mnt['kode_pembelajaran_alquran']; ?>">Rincian</a>
                        </td>
                        <td class="text-center">
                            <?php
                            $monitoring = $mnt['review'];
                            if($monitoring == 1){
                                ?>
                                <img src="<?= base_url(); ?>assets/icon/check.png" style="width: 25px; height: 25px;">
                                <?php
                            } else {
                                ?>
                                <a href="<?= base_url(); ?>monitoring/user_check/<?= $mnt['kode_pembelajaran_alquran']; ?>">
                                    <img src="<?= base_url(); ?>assets/icon/uncheck.png" style="width: 25px; height: 25px;">
                                </a>
                                <?php
                            }
                            ?>
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
    $(document).ready(function() {
        $('#monitoring').DataTable();
    });
</script>