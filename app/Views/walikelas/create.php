<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Tambah Wali Kelas<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('walikelas') ?>">Data Wali Kelas</a></li>
                            <li class="breadcrumb-item active">Tambah Wali Kelas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Wali Kelas</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('walikelas') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
        <?php endif ?>

        <form action="<?= base_url('walikelas/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Wali Kelas</strong>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_user" class="form-control" value="<?= old('nama_user') ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>NIP <span class="text-danger">*</span></label>
                                <input type="number" name="nip" class="form-control" value="<?= old('nip') ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="pns" <?= old('status') == 'pns' ? 'selected' : '' ?>>PNS</option>
                                    <option value="honorer" <?= old('status') == 'honorer' ? 'selected' : '' ?>>Honorer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <strong>Upload Foto</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted">Kosongkan jika tidak ingin upload</small>
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
