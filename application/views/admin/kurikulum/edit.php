<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">
                    <figure>
                        <blockquote class="blockquote">
                            <img src="<?= base_url(); ?>assets/icon/upload.png" class="img-fluid" alt="Bootstrap Themes" width="64px" height="64px" loading="lazy">
                            <p>Upload file Kurikulum</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Menampilkan proses <cite title="Source Title">upload Kurikulum</cite>
                        </figcaption>
                    </figure>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('adminpanel/editFileKurikulum'); ?>
                    <div class="row mb-3 mt-3">
                        <label for="formFile" class="col-sm-2 col-form-label">File Kurikulum</label>
                        <div class="col">
                            <input class="form-control" type="file" id="formFile" name="nama_file">
                            <small class="text-muted">Tipe file yang diperbolehkan hanyalah PDF.</small>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Kode File</label>
                        <div class="col">
                            <input type="number" name="kode_file" class="form-control" id="colFormLabel" placeholder="kode file" value="<?= $files['kode_file'] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('kode_file'); ?></small>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="edit" class="btn btn-success">Perbarui Kurikulum</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>