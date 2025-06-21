<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SPP APPS | <?= $this->renderSection('title') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/indexumri.png') ?>" type="image/x-icon">

    <!-- DataTables CSS -->
    <link href="<?= base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>" rel="stylesheet" />

    <!-- App CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" id="bs-default-stylesheet" />
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" id="app-default-stylesheet" />

    <link href="<?= base_url('assets/css/bootstrap-dark.min.css') ?>" rel="stylesheet" id="bs-dark-stylesheet" />
    <link href="<?= base_url('assets/css/app-dark.min.css') ?>" rel="stylesheet" id="app-dark-stylesheet" />

    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" />
</head>

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}}'>

    <div id="wrapper">

        <!-- Topbar -->
        <?= $this->include('partials/topbar') ?>
        <?= $this->include('partials/topnav') ?>

        <!-- Content -->
        <div class="content-page">
            <?= $this->renderSection('content') ?>

            <!-- Footer -->
            <?= $this->include('partials/footer') ?>
        </div>

    </div>

    <!-- Vendor JS -->
    <script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

    <!-- Plugins JS -->
    <script src="<?= base_url('assets/libs/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- DataTables JS -->
    <script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-select/js/dataTables.select.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>

    <!-- Datatables Init -->
    <script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>

    <!-- App JS -->
    <script src="<?= base_url('assets/js/app.min.js') ?>"></script>

</body>
</html>
