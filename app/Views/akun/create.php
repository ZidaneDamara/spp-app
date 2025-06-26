<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Tambah Akun<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <!-- page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('akun') ?>">Data Akun</a></li>
                            <li class="breadcrumb-item active">Tambah Akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Data Akun</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('akun') ?>" class="btn btn-secondary">← Kembali</a>
                </div>
            </div>
        </div>

        <!-- Notifikasi error -->
        <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
        <?php endif ?>

        <form action="<?= base_url('akun/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Akun</strong>
                        </div>
                        <div class="card-body row">

                            <div class="form-group col-md-6">
                                <label>Kode <span class="text-danger">*</span></label>
                                <input type="text" name="kode" class="form-control" value="<?= old('kode') ?>" required>
                                <small class="text-muted">Contoh: 100-000, 200-100, dst</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Jenis Akun <span class="text-danger">*</span></label>
                                <select name="id_jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis Akun --</option>
                                    <?php foreach($jenis_akun as $ja): ?>
                                    <option value="<?= $ja['id_jenis'] ?>"
                                        <?= old('id_jenis') == $ja['id_jenis'] ? 'selected' : '' ?>>
                                        <?= esc($ja['nama_jenis']) ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Akun <span class="text-danger">*</span></label>
                                <input type="text" name="nama_akun" class="form-control" value="<?= old('nama_akun') ?>"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Saldo Debet</label>
                                <input type="number" name="debet" class="form-control" value="<?= old('debet', '0') ?>"
                                    step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Saldo Kredit</label>
                                <input type="number" name="kredit" class="form-control"
                                    value="<?= old('kredit', '0') ?>" step="0.01">
                            </div>

                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>