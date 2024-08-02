<?= $this->extend('layouts/base_layouts') ?>
<?= $this->section('title') ?>Tambah Data Aser<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Aset</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('admin/barang/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <?= $this->include('layouts/alerts/errors'); ?>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="klasifikasi">Klasifikasi:</label>
                                <select class="form-control mb-3" id="klasifikasi" name="klasifikasi">
                                    <option value="ABC">Barang</option>
                                    <option value="DEF">Kendaraan</option>
                                    <!-- Tambahkan opsi lain jika diperlukan -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="jumlah">Jumlah Barang</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control mb-3" />
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