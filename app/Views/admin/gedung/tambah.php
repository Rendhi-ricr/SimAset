<?= $this->extend('layouts/base_layouts') ?>
<?= $this->section('title') ?>Tambah Data Gedung<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Gedung</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('admin/gedung/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <?= $this->include('layouts/alerts/errors'); ?>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="klasifikasi">Klasifikasi:</label>
                                <select class="form-control mb-3" id="klasifikasi" name="klasifikasi">
                                    <option value="REK">Rektorat</option>
                                    <option value="FIA">Fakultas Ilmu Administrasi</option>
                                    <option value="FSK">Fakultas Ilmu Komputer</option>
                                    <option value="FIH">Fakultas Ilmu Hukum</option>
                                    <option value="FAP">Fakultas Pertanian</option>
                                    <option value="FAP">Fakultas Pertanian</option>
                                    <option value="FKM">Fakultas Ilmu Komunikasi</option>
                                    <option value="FKI">Fakultas Ilmu Pendidikan</option>
                                    <option value="GBL">Gedung Belakang</option>
                                    <option value="PSC">Pasca Sarjana</option>
                                    <!-- Tambahkan opsi lain jika diperlukan -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="nama_gedung">Nama Gedung</label>
                                <input type="text" name="nama_gedung" id="nama_gedung" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control mb-3" />
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
    </form>
    <!--/ Tambah::End -->
</div>
<?= $this->endSection() ?>