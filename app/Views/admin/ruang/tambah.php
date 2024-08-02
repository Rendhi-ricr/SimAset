<?= $this->extend('layouts/base_layouts') ?>
<?= $this->section('title') ?>Tambah Data Ruangan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Ruangan</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('admin/ruang/tambah') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card">
            <div class="card-body">
                <?= $this->include('layouts/alerts/errors'); ?>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="klasifikasi">Klasifikasi:</label>
                        <select class="form-control mb-3" id="klasifikasi" name="klasifikasi" onchange="updateKlasifikasi()" required>
                            <option value="">Pilih Klasifikasi</option>
                            <option value="REK" <?= $selectedKlasifikasi === 'REK' ? 'selected' : '' ?>>Rektorat</option>
                            <option value="FIA" <?= $selectedKlasifikasi === 'FIA' ? 'selected' : '' ?>>Fakultas Ilmu Administrasi</option>
                            <option value="FSK" <?= $selectedKlasifikasi === 'FSK' ? 'selected' : '' ?>>Fakultas Ilmu Komputer</option>
                            <option value="FIH" <?= $selectedKlasifikasi === 'FIH' ? 'selected' : '' ?>>Fakultas Ilmu Hukum</option>
                            <option value="FAP" <?= $selectedKlasifikasi === 'FAP' ? 'selected' : '' ?>>Fakultas Pertanian</option>
                            <option value="FKM" <?= $selectedKlasifikasi === 'FKM' ? 'selected' : '' ?>>Fakultas Ilmu Komunikasi</option>
                            <option value="FKI" <?= $selectedKlasifikasi === 'FKI' ? 'selected' : '' ?>>Fakultas Ilmu Pendidikan</option>
                            <option value="GBL" <?= $selectedKlasifikasi === 'GBL' ? 'selected' : '' ?>>Gedung Belakang</option>
                            <option value="PSC" <?= $selectedKlasifikasi === 'PSC' ? 'selected' : '' ?>>Pasca Sarjana</option>
                            <!-- Tambahkan opsi lain jika diperlukan -->
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="kode_gedung">Nama Gedung</label>
                        <select class="form-control mb-3" id="kode_gedung" name="kode_gedung" required>
                            <option value="">Pilih Gedung</option>
                            <?php if (!empty($gedungByKlasifikasi)) : ?>
                                <?php foreach ($gedungByKlasifikasi as $gedung) : ?>
                                    <option value="<?= esc($gedung['kode_gedung']) ?>"><?= esc($gedung['nama_gedung']) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="lantai">Lantai</label>
                        <input type="text" name="lantai" id="lantai" class="form-control mb-3" placeholder="Masukkan Lantai" required />
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control mb-3" placeholder="Masukkan Nama Ruangan" required />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control mb-3" placeholder="Masukkan Keterangan" />
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <!--/ Tambah::End -->
</div>

<script>
    function updateKlasifikasi() {
        const klasifikasi = document.getElementById('klasifikasi').value;
        const formAction = `<?= site_url('admin/ruang/tambah') ?>?klasifikasi=${klasifikasi}`;
        document.getElementById('editor-form').action = formAction;
        document.getElementById('editor-form').submit();
    }
</script>
<?= $this->endSection() ?>