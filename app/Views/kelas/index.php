<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Data Kelas<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Kelas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Kelas</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('kelas/create') ?>" class="btn btn-primary">+ Tambah Kelas</a>
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
                                    <th>Nama Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Jurusan</th>
                                    <th>Wali Kelas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($kelas as $k): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($k['nama_kelas']) ?></td>
                                    <td><?= esc($k['tingkat']) ?></td>
                                    <td><?= esc($k['jurusan']) ?></td>
                                    <td><?= esc($k['wali_nama'] ?? 'Belum ditentukan') ?></td>
                                    <td>
                                        <span class="badge badge-<?= $k['status'] == 'aktif' ? 'success' : 'secondary' ?>">
                                            <?= ucfirst($k['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('kelas/edit/' . $k['id_kelas']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('kelas/destroy/' . $k['id_kelas']) ?>"
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
