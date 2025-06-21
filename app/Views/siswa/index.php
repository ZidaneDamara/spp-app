<?php echo $this->extend('partials/master'); ?>
<?php echo $this->section('title'); ?>Data Siswa<?php echo $this->endSection(); ?>
<?php echo $this->section('content'); ?>

<div class="content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item">Data Siswa</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Data Siswa</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('siswa/create') ?>" class="btn btn-primary">+ Tambah Siswa</a>
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
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($siswa as $s): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($s['nis']) ?></td>
                                    <td><?= esc($s['nama']) ?></td>
                                    <td><?= esc($s['kelas']) ?></td>
                                    <td>
                                        <?php
                                        if (strtolower($s['jenis_kelamin']) == 'l') {
                                            echo 'Laki-laki';
                                        } elseif (strtolower($s['jenis_kelamin']) == 'p') {
                                            echo 'Perempuan';
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>

                                    <td><?= esc($s['alamat']) ?></td>
                                    <td><?= esc($s['no_hp']) ?></td>
                                    <td>
                                        <a href="<?= base_url('siswa/edit/' . $s['id_siswa']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('siswa/delete/' . $s['id_siswa']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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

<?php echo $this->endSection(); ?>
