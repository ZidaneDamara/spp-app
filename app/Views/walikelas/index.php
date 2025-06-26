<?= $this->extend('partials/master'); ?>
<?= $this->section('title'); ?>Data Wali Kelas<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Wali Kelas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Wali Kelas</h4>
                </div>

                <div class="text-right mb-3">
                    <a href="<?= base_url('walikelas/create') ?>" class="btn btn-primary">+ Tambah Wali Kelas</a>
                </div>
            </div>
        </div>

        <!-- data table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($wali_kelas as $w): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($w['nama_user']) ?></td>
                                    <td><?= esc($w['nip']) ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/walikelas/' . $w['foto']) ?>" alt="Foto" width="40" height="40" class="rounded-circle">
                                    </td>
                                    <td>
                                        <a href="<?= base_url('walikelas/edit/' . $w['id_walikelas']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('walikelas/delete/' . $w['id_walikelas']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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

<?= $this->endSection(); ?>
