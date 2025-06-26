<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Edit Jenis Akun<?= $this->endSection() ?>
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
                            <li class="breadcrumb-item"><a href="<?= base_url('tipe-akun') ?>">Data Jenis Akun</a></li>
                            <li class="breadcrumb-item active">Edit Jenis Akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Data Jenis Akun</h4>
                </div>
                <div class="text-right mb-3">
                    <a href="<?= base_url('tipe-akun') ?>" class="btn btn-secondary">← Kembali</a>
                </div>
            </div>
        </div>

        <!-- Notifikasi error -->
        <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
        <?php endif ?>

        <form action="<?= base_url('tipe-akun/update/' . $jenis_akun['id_jenis']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>Data Jenis Akun</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nama Jenis <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_jenis" class="form-control"
                                        value="<?= old('nama_jenis', $jenis_akun['nama_jenis']) ?>" required>
                                    <small class="text-muted">Contoh: Kas, Bank, Aktiva, Piutang, Hutang, Modal,
                                        Pendapatan, Beban</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('tipe-akun') ?>" class="btn btn-light">Batal</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>