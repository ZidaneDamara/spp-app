<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Edit Kelas<?= $this->endSection() ?>
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
                            <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>">Data Kelas</a></li>
                            <li class="breadcrumb-item active">Edit Kelas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Data Kelas</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('kelas') ?>" class="btn btn-secondary">← Kembali</a>
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

        <form action="<?= base_url('kelas/update/' . $kelas['id_kelas']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Kelas</strong>
                        </div>
                        <div class="card-body row">

                            <div class="form-group col-md-6">
                                <label>Nama Kelas <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kelas" class="form-control"
                                    value="<?= old('nama_kelas', $kelas['nama_kelas']) ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tingkat <span class="text-danger">*</span></label>
                                <select name="tingkat" class="form-control" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="X"
                                        <?= old('tingkat', $kelas['tingkat']) == 'X' ? 'selected' : '' ?>>X</option>
                                    <option value="XI"
                                        <?= old('tingkat', $kelas['tingkat']) == 'XI' ? 'selected' : '' ?>>XI</option>
                                    <option value="XII"
                                        <?= old('tingkat', $kelas['tingkat']) == 'XII' ? 'selected' : '' ?>>XII</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control"
                                    value="<?= old('jurusan', $kelas['jurusan']) ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Wali Kelas</label>
                                <select name="id_wali_kelas" class="form-control">
                                    <option value="">-- Pilih Wali Kelas --</option>
                                    <?php foreach($wali_kelas as $wali): ?>
                                    <option value="<?= $wali['id_walikelas'] ?>"
                                        <?= old('id_wali_kelas', $kelas['id_wali_kelas'] ?? '') == $wali['id_walikelas'] ? 'selected' : '' ?>>
                                        <?= esc($wali['nama_user']) ?>
                                    </option>

                                    <?php endforeach ?>
                                </select>
                                <small class="text-muted">Kosongkan jika tanpa wali kelas</small>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif"
                                        <?= old('status', $kelas['status']) == 'aktif' ? 'selected' : '' ?>>Aktif
                                    </option>
                                    <option value="nonaktif"
                                        <?= old('status', $kelas['status']) == 'nonaktif' ? 'selected' : '' ?>>Nonaktif
                                    </option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('kelas') ?>" class="btn btn-light">Batal</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
