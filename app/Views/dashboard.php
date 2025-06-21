<?= $this->extend('partials/master') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-blue rounded">
                                <i class="fe-users avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $total_siswa ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-uppercase">Siswa Aktif <span class="float-right"><?= $total_siswa > 0 ? round(($total_siswa / ($total_siswa + 50)) * 100) : 0 ?>%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="<?= $total_siswa > 0 ? round(($total_siswa / ($total_siswa + 50)) * 100) : 0 ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width: <?= $total_siswa > 0 ? round(($total_siswa / ($total_siswa + 50)) * 100) : 0 ?>%">
                                <span class="sr-only"><?= $total_siswa > 0 ? round(($total_siswa / ($total_siswa + 50)) * 100) : 0 ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-success rounded">
                                <i class="fe-check-circle avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $total_tagihan_lunas ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Tagihan Lunas</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-uppercase">Persentase Lunas <span class="float-right"><?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_lunas / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_lunas / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width: <?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_lunas / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>%">
                                <span class="sr-only"><?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_lunas / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-warning rounded">
                                <i class="fe-clock avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $total_tagihan_belum ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Tagihan Belum Lunas</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-uppercase">Persentase Tunggakan <span class="float-right"><?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_belum / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="<?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_belum / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width: <?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_belum / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>%">
                                <span class="sr-only"><?= ($total_tagihan_lunas + $total_tagihan_belum) > 0 ? round(($total_tagihan_belum / ($total_tagihan_lunas + $total_tagihan_belum)) * 100) : 0 ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-info rounded">
                                <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup"><?= $pembayaran_hari_ini['jumlah_transaksi'] ?? 0 ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Pembayaran Hari Ini</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-uppercase">Total Hari Ini <span class="float-right">Rp <?= number_format($pembayaran_hari_ini['total_pembayaran'] ?? 0, 0, ',', '.') ?></span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="<?= isset($pembayaran_hari_ini['jumlah_transaksi']) && $pembayaran_hari_ini['jumlah_transaksi'] > 0 ? 100 : 0 ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width: <?= isset($pembayaran_hari_ini['jumlah_transaksi']) && $pembayaran_hari_ini['jumlah_transaksi'] > 0 ? 100 : 0 ?>%">
                                <span class="sr-only"><?= isset($pembayaran_hari_ini['jumlah_transaksi']) && $pembayaran_hari_ini['jumlah_transaksi'] > 0 ? 100 : 0 ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-widgets">
                            <a href="<?= base_url('spp/tagihan') ?>" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false"
                                aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                            <a href="<?= base_url('laporan/tunggakan') ?>" data-toggle="remove"><i class="mdi mdi-external-link"></i></a>
                        </div>
                        <h4 class="header-title mb-0">Ringkasan Tunggakan</h4>

                        <div id="cardCollpase1" class="collapse pt-3 show">
                            <div class="text-center">

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Total Tagihan</p>
                                        <h4><i class="fe-file-text text-primary mr-1"></i><?= $unpaid_bills_summary['jumlah'] ?? 0 ?></h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Total Nominal</p>
                                        <h4><i class="fe-dollar-sign text-warning mr-1"></i>Rp <?= number_format(($unpaid_bills_summary['total'] ?? 0) / 1000000, 1) ?>M</h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Siswa Tunggakan</p>
                                        <h4><i class="fe-users text-danger mr-1"></i><?= $total_tagihan_belum ?></h4>
                                    </div>
                                </div> <!-- end row -->

                            </div>
                        </div> <!-- collapsed end -->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-widgets">
                            <a href="<?= base_url('spp/pembayaran') ?>" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false"
                                aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                            <a href="<?= base_url('laporan/pembayaran') ?>" data-toggle="remove"><i class="mdi mdi-external-link"></i></a>
                        </div>
                        <h4 class="header-title mb-0">Pembayaran Hari Ini</h4>

                        <div id="cardCollpase2" class="collapse pt-3 show">
                            <div class="text-center">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Transaksi</p>
                                        <h4><i class="fe-credit-card text-success mr-1"></i><?= $pembayaran_hari_ini['jumlah_transaksi'] ?? 0 ?></h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Total</p>
                                        <h4><i class="fe-dollar-sign text-success mr-1"></i>Rp <?= number_format(($pembayaran_hari_ini['total_pembayaran'] ?? 0) / 1000000, 1) ?>M</h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Rata-rata</p>
                                        <h4><i class="fe-trending-up text-info mr-1"></i>Rp <?= isset($pembayaran_hari_ini['jumlah_transaksi']) && $pembayaran_hari_ini['jumlah_transaksi'] > 0 ? number_format(($pembayaran_hari_ini['total_pembayaran'] ?? 0) / $pembayaran_hari_ini['jumlah_transaksi'] / 1000, 0) : 0 ?>K</h4>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div> <!-- collapsed end -->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-widgets">
                            <a href="<?= base_url('master/siswa') ?>" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false"
                                aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                            <a href="<?= base_url('master/siswa') ?>" data-toggle="remove"><i class="mdi mdi-external-link"></i></a>
                        </div>
                        <h4 class="header-title mb-0">Statistik Siswa</h4>

                        <div id="cardCollpase3" class="collapse pt-3 show">
                            <div class="text-center">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Siswa Aktif</p>
                                        <h4><i class="fe-user-check text-success mr-1"></i><?= $total_siswa ?></h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Sudah Lunas</p>
                                        <h4><i class="fe-check-circle text-primary mr-1"></i><?= $total_tagihan_lunas ?></h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Belum Lunas</p>
                                        <h4><i class="fe-clock text-warning mr-1"></i><?= $total_tagihan_belum ?></h4>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div> <!-- collapsed end -->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<?= $this->endSection() ?>
