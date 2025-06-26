<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Data Jenis Akun<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Jenis Akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Jenis Akun</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('tipe-akun/create') ?>" class="btn btn-primary">+ Tambah Jenis Akun</a>
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

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
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
                                    <th>Nama Jenis</th>
                                    <th>Jumlah Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($jenis_akun as $ja): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($ja['nama_jenis']) ?></td>
                                    <td>
                                        <?php 
                                        // Hitung jumlah akun yang menggunakan jenis ini
                                        $akunModel = new \App\Models\AkunModel();
                                        $jumlahAkun = $akunModel->where('id_jenis', $ja['id_jenis'])->countAllResults();
                                        echo $jumlahAkun . ' akun';
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('tipe-akun/show/' . $ja['id_jenis']) ?>"
                                            class="btn btn-info btn-sm">Detail</a>
                                        <a href="<?= base_url('tipe-akun/edit/' . $ja['id_jenis']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('tipe-akun/delete/' . $ja['id_jenis']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini? Pastikan tidak ada akun yang menggunakan jenis ini.')">Hapus</a>
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