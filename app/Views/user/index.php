<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Data User<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item">Data User</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Data User</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('user/create') ?>" class="btn btn-primary">+ Tambah User</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($user as $u): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($u['username']) ?></td>
                                    <td><?= esc($u['nama_user']) ?></td>
                                    <td><?= ucfirst($u['role']) ?></td>
                                    <td>
                                        <span
                                            class="badge badge-<?= $u['status'] == 'aktif' ? 'success' : 'secondary' ?>">
                                            <?= ucfirst($u['status']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <a href="<?= base_url('user/edit/' . $u['id_user']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('user/delete/' . $u['id_user']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
