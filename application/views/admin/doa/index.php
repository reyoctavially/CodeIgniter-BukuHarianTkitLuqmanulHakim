<!-- ======= Section ======= -->
<section id="about" class="about">
    <div class="container">
        <?php
        if ($this->session->flashdata('flash')) :
        ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Do'a & Hadits <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        if ($this->session->flashdata('flash2')) :
        ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Do'a & Hadits <strong>berhasil</strong> <?= $this->session->flashdata('flash2'); ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row flex-lg-row align-items-center">
            <!-- <div class="col-5 col-sm-3 col-lg-2">
				<img src="<?= base_url(); ?>assets/images/bocil3.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50%" height="50%" loading="lazy">
			</div> -->
            <div class="col-lg-10">
                <figure>
                    <blockquote class="blockquote">
                        <img src="<?= base_url(); ?>assets/icon/upload.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
                        <p>Upload Do'a & Hadits Kelompok</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Menampilkan data file <cite title="Source Title">Do'a & Hadits</cite> untuk ditampilkan pada buku penghubung.
                    </figcaption>
                </figure>
            </div>
        </div><br>

        <b>
            <p>Do'a & Hadits Kelompok A</p>
        </b>
        <table id="file" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Kelompok</th>
                    <th class="text-center">Ketersediaan File</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="text-center">A</td>
                    <td class="text-center">Ya</td>
                    <td class="text-center"><?= $files1['nama_file'] ?></td>
                    <td>
                        <a class="btn btn-primary float-end" href="<?= base_url(); ?>adminpanel/editFileDoaKelompokA/<?= $files1['kode_file']; ?>">Upload File Baru</a>
                        <a class="btn btn-success float-end" href="<?= base_url(); ?>adminpanel/detailFileDoa/<?= $files1['kode_file']; ?>">Lihat Doa/Hadits</a>
                    </td>
                </tr>
            </tbody>
        </table><br><br>

        <b>
            <p>Do'a & Hadits Kelompok B</p>
        </b>
        <table id="file" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Kelompok</th>
                    <th class="text-center">Ketersediaan File</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="text-center">B</td>
                    <td class="text-center">Ya</td>
                    <td class="text-center"><?= $files2['nama_file'] ?></td>
                    <td>
                        <a class="btn btn-primary float-end" href="<?= base_url(); ?>adminpanel/editFileDoaKelompokB/<?= $files2['kode_file']; ?>">Upload File Baru</a>
                        <a class="btn btn-success float-end" href="<?= base_url(); ?>adminpanel/detailFileDoa/<?= $files2['kode_file']; ?>">Lihat Doa/Hadits</a>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</section><!-- End Section -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>