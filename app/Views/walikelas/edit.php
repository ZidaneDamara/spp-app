<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Edit Wali Kelas<?= $this->endSection() ?>
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
                            <li class="breadcrumb-item active">Edit Wali Kelas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Wali Kelas</h4>
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

        <form action="<?= base_url('walikelas/update/' . $wali['id_walikelas']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Edit Data Wali Kelas</strong>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_user" class="form-control"
                                    value="<?= old('nama_user', $wali['nama_user']) ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>NIP <span class="text-danger">*</span></label>
                                <input type="number" name="nip" class="form-control"
                                    value="<?= old('nip', $wali['nip']) ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="pns" <?= old('status', $wali['status']) == 'pns' ? 'selected' : '' ?>>PNS</option>
                                    <option value="honorer" <?= old('status', $wali['status']) == 'honorer' ? 'selected' : '' ?>>Honorer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Foto -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <strong>Upload Foto</strong>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($wali['foto']) && $wali['foto'] != 'default.png'): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/walikelas/' . $wali['foto']) ?>" alt="Foto" class="img-thumbnail" width="150">
                                </div>
                            <?php endif ?>

                            <div class="form-group">
                                <label>Ganti Foto</label>
                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted">Kosongkan jika tidak ingin ganti foto</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= base_url('walikelas') ?>" class="btn btn-light">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
