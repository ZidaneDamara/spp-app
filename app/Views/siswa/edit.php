<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Edit Data Siswa<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="page-title-box d-flex justify-content-between align-items-center">
            <div>
                <h4 class="page-title">Edit Data Siswa</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary">← Kembali</a>
        </div>

        <!-- notifikasi error -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= base_url('siswa/update/' . $siswa['id_siswa']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <!-- Data Siswa -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Siswa</strong>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-4">
                                <label>NIS <span class="text-danger">*</span></label>
                                <input type="number" name="nis" class="form-control" value="<?= old('nis', $siswa['nis']) ?>" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>NISN</label>
                                <input type="number" name="nisn" class="form-control" value="<?= old('nisn', $siswa['nisn']) ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" value="<?= old('nama', $siswa['nama']) ?>" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="L" <?= old('jenis_kelamin', $siswa['jenis_kelamin']) == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= old('jenis_kelamin', $siswa['jenis_kelamin']) == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= old('tempat_lahir', $siswa['tempat_lahir']) ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?= old('tanggal_lahir', $siswa['tanggal_lahir']) ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" class="form-control" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <?php foreach ($kelas as $k): ?>
                                        <option value="<?= $k['id_kelas'] ?>" <?= old('kelas_id', $siswa['kelas_id']) == $k['id_kelas'] ? 'selected' : '' ?>>
                                            <?= esc($k['nama_kelas']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tahun Masuk <span class="text-danger">*</span></label>
                                <input type="number" name="tahun_masuk" class="form-control" value="<?= old('tahun_masuk', $siswa['tahun_masuk']) ?>" maxlength="4" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="aktif" <?= old('status', $siswa['status']) == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="lulus" <?= old('status', $siswa['status']) == 'lulus' ? 'selected' : '' ?>>Lulus</option>
                                    <option value="keluar" <?= old('status', $siswa['status']) == 'keluar' ? 'selected' : '' ?>>Keluar</option>
                                    <option value="mutasi" <?= old('status', $siswa['status']) == 'mutasi' ? 'selected' : '' ?>>Mutasi</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"><?= old('alamat', $siswa['alamat']) ?></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= old('no_hp', $siswa['no_hp']) ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= old('email', $siswa['email']) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Orang Tua -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <strong>Data Orang Tua</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" value="<?= old('nama_ayah', $siswa['nama_ayah']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" value="<?= old('nama_ibu', $siswa['nama_ibu']) ?>">
                            </div>

                            <div class="form-group">
                                <label>No HP Orang Tua</label>
                                <input type="text" name="no_hp_ortu" class="form-control" value="<?= old('no_hp_ortu', $siswa['no_hp_ortu']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Foto</label><br>
                                <?php if (!empty($siswa['foto'])): ?>
                                    <img src="<?= base_url('uploads/siswa/' . $siswa['foto']) ?>" alt="Foto Siswa" class="img-thumbnail mb-2" width="100">
                                <?php endif ?>
                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted">Kosongkan jika tidak ingin ganti foto</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('siswa') ?>" class="btn btn-light">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
