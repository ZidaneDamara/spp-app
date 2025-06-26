<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Data Akun<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Akun</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('akun/create') ?>" class="btn btn-primary">+ Tambah Akun</a>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Akun</th>
                                    <th>Jenis</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($akun as $a): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($a['kode']) ?></td>
                                    <td><?= esc($a['nama_akun']) ?></td>
                                    <td><?= esc($a['nama_jenis']) ?></td>
                                    <td class="text-right"><?= number_format($a['debet'], 0, ',', '.') ?></td>
                                    <td class="text-right"><?= number_format($a['kredit'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="<?= base_url('akun/edit/' . $a['id_akun']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('akun/delete/' . $a['id_akun']) ?>"
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