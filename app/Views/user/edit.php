<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Edit User<?= $this->endSection() ?>
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
                            <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Data User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Data User</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('user') ?>" class="btn btn-secondary">← Kembali</a>
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

        <form action="<?= base_url('user/update/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data User</strong>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label>Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control"
                                    value="<?= old('username', $user['username']) ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nama User <span class="text-danger">*</span></label>
                                <input type="text" name="nama_user" class="form-control"
                                    value="<?= old('nama_user', $user['nama_user']) ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Role <span class="text-danger">*</span></label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin"
                                        <?= old('role', $user['role']) == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="bendahara"
                                        <?= old('role', $user['role']) == 'bendahara' ? 'selected' : '' ?>>Bendahara
                                    </option>
                                    <option value="operator"
                                        <?= old('role', $user['role']) == 'operator' ? 'selected' : '' ?>>Operator
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif"
                                        <?= old('status', $user['status']) == 'aktif' ? 'selected' : '' ?>>Aktif
                                    </option>
                                    <option value="nonaktif"
                                        <?= old('status', $user['status']) == 'nonaktif' ? 'selected' : '' ?>>Nonaktif
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Foto</label><br>
                                <?php
                                $fotoUser = $user['foto'] ?? 'default.png';
                                $uploadPath = FCPATH . 'uploads/foto/' . $fotoUser;
                                $fotoPath = !empty($fotoUser) && file_exists($uploadPath) ? base_url('uploads/foto/' . $fotoUser) : base_url('assets/images/users/user-1.jpg');
                                ?>
                                <img src="<?= $fotoPath ?>" alt="Foto User" class="img-thumbnail mb-2" width="100">

                                <input type="file" name="foto" class="form-control-file">
                                <small class="text-muted">Kosongkan jika tidak ingin ganti foto</small>
                            </div>

                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('user') ?>" class="btn btn-light">Batal</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
