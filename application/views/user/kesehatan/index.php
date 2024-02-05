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
                <img src="<?= base_url(); ?>assets/images/bocil4.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
            </div>
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
        <table id="pertumbuhan" class="table table-striped table-hover">
            <caption>Tabel pertumbuhan siswa</caption>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Tinggi Badan</th>
                    <th class="text-center">Berat Badan</th>
                    <th class="text-center">Opsi</th>
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
                        <td class="text-center">
                            <a class="btn btn-success float-end m-1" href="<?= base_url(); ?>kesehatan/user_detail_pertumbuhan/<?= $avs['kode_pertumbuhan']; ?>">Rincian</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>

        <?php
        foreach ($kode_perkembangan as $avs) :
            $split = explode('-', $avs['kode_pemeriksaan']);
            $number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
            $code2 = "PRS-".$number;
        endforeach;
        ?>

        <p class="card-text">
            <h5 class="card-title text-center" style="margin-top:50px;">Hasil Pemeriksaan Penjaringan Kesehatan dan <br> Tumbuh Kembang Anak oleh Tim Puskesmas</h5>
        </p><br>
        <table id="klinik" class="table table-striped table-hover">
            <caption>Tabel tumbuh kembang siswa</caption>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Daya Lihat</th>
                    <th class="text-center">Daya Dengar</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $nomor = 1;
                foreach ($perkembangan as $avs) :
                    ?>
                    <tr>
                        <td class="text-center"><?= $nomor++ ?></td>
                        <td class="text-center"><?= $avs['tgl_pemeriksaan'] ?></td>
                        <td><?= $avs['nama_siswa'] ?></td>
                        <td class="text-center"><?= $avs['usia_pemeriksaan'] ?> tahun</td>
                        <td class="text-center"><?= $avs['daya_lihat'] ?></td>
                        <td class="text-center"><?= $avs['daya_dengar'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-success float-end m-1" href="<?= base_url(); ?>kesehatan/user_detail_perkembangan/<?= $avs['kode_pemeriksaan']; ?>">Rincian</a>
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
        $('#pertumbuhan').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#klinik').DataTable();
    });
</script>