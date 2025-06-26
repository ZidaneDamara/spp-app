<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Tambah Siswa<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
                            <li class="breadcrumb-item active">Tambah Data Siswa</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Data Siswa</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('siswa') ?>" class="btn btn-secondary">Kembali</a>
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

        <form action="<?= base_url('siswa/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Card Data Siswa col-12 -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Siswa</strong>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-4">
                                <label>NIS <span class="text-danger">*</span></label>
                                <input type="number" name="nis" class="form-control" value="<?= old('nis') ?>"
                                    required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>NISN</label>
                                <input type="number" name="nisn" class="form-control" value="<?= old('nisn') ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>"
                                    required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>
                                        Laki-Laki</option>
                                    <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="<?= old('tempat_lahir') ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                    value="<?= old('tanggal_lahir') ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" class="form-control" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <?php foreach ($kelas as $k): ?>
                                    <option value="<?= $k['id_kelas'] ?>"
                                        <?= old('kelas_id') == $k['id_kelas'] ? 'selected' : '' ?>>
                                        <?= esc($k['nama_kelas']) ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tahun Masuk <span class="text-danger">*</span></label>
                                <input type="number" name="tahun_masuk" class="form-control"
                                    value="<?= old('tahun_masuk') ?>" required maxlength="4">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="aktif" <?= old('status') == 'aktif' ? 'selected' : '' ?>>Aktif
                                    </option>
                                    <option value="lulus" <?= old('status') == 'lulus' ? 'selected' : '' ?>>Lulus
                                    </option>
                                    <option value="keluar" <?= old('status') == 'keluar' ? 'selected' : '' ?>>Keluar
                                    </option>
                                    <option value="mutasi" <?= old('status') == 'mutasi' ? 'selected' : '' ?>>Mutasi
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"><?= old('alamat') ?></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= old('no_hp') ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <strong>Data Orang Tua</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control"
                                    value="<?= old('nama_ayah') ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control"
                                    value="<?= old('nama_ibu') ?>">
                            </div>

                            <div class="form-group">
                                <label>No HP Orang Tua</label>
                                <input type="text" name="no_hp_ortu" class="form-control"
                                    value="<?= old('no_hp_ortu') ?>">
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted">Kosongkan jika tidak upload foto</small>
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
