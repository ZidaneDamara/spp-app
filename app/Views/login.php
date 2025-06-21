<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SPP APPS | Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/indexumri.png') ?>" type="image/x-icon">

    <!-- App css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="<?= base_url('assets/css/bootstrap-dark.min.css') ?>" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?= base_url('assets/css/app-dark.min.css') ?>" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />

    <style>
        .login-container {
            min-height: 100vh;
        }

        .welcome-section {
            background: linear-gradient(135deg, rgb(170, 234, 102) 0%, rgb(75, 79, 162) 100%);
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('<?= base_url('assets/images/gedung_rektorat.jpg') ?>') no-repeat center center;
            opacity: 0.3;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .login-section {
            background: #f8f9fa;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .login-form-container {
            margin: 0 auto;
        }

        .logo-container {
            background: white;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, rgb(197, 234, 102) 0%, rgb(75, 162, 91) 100%);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .welcome-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .password-toggle {
            cursor: pointer;
            color: #6c757d;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #495057;
        }

        @media (max-width: 768px) {
            .welcome-section {
                display: none;
            }

            .login-section {
                box-shadow: none;
            }
        }

        @media (max-width: 576px) {
            .login-form-container {
                padding: 1rem;
            }

            .logo-container {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>

<body class="loading">
    <div class="container-fluid p-0">
        <div class="row no-gutters login-container">
            <!-- Welcome Section - col 8 -->
            <div class="col-lg-8 col-md-7 welcome-section d-flex align-items-center justify-content-center">
                <div class="welcome-content text-center text-white p-5">
                    <div class="welcome-icon">
                        <i class="mdi mdi-school"></i>
                    </div>
                    <h1 class="display-4 font-weight-bold mb-4 text-white">
                        Selamat Datang di<br>
                        <span class="text-warning">Aplikasi SPP</span>
                    </h1>
                    <p class="lead mb-4 px-3">
                        Sistem Pembayaran SPP yang modern, aman, dan mudah digunakan.
                        Kelola pembayaran sekolah Anda dengan efisien dan transparan.
                    </p>
                    <div class="row text-center mt-5">
                        <div class="col-4">
                            <div class="mb-2">
                                <i class="mdi mdi-shield" style="font-size: 2rem;"></i>
                            </div>
                            <small>Keamanan Terjamin</small>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <i class="mdi mdi-clock-fast" style="font-size: 2rem;"></i>
                            </div>
                            <small>Proses Cepat</small>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <i class="mdi mdi-phone" style="font-size: 2rem;"></i>
                            </div>
                            <small>Akses Mobile</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Form Section - col 4 -->
            <div class="col-lg-4 col-md-5 login-section d-flex align-items-center justify-content-center">
                <div class="login-form-container w-100 p-4">
                    <!-- Logo -->
                    <div class="logo-container">
                        <img src="<?= base_url('assets/images/indexumri.png') ?>" alt="Logo"
                            style="max-width: 80px; max-height: 80px;">
                    </div>

                    <!-- Form Header -->
                    <div class="text-center mb-4">
                        <h3 class="font-weight-bold text-dark mb-2">Masuk ke Akun Anda</h3>
                        <p class="text-muted">Silakan masukkan username dan password Anda</p>
                    </div>

                    <!-- Alert untuk error message (jika ada) -->
                    <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form action="<?= base_url('login') ?>" method="post" class="needs-validation" novalidate>
                        <?= csrf_field() ?>

                        <!-- Username Field -->
                        <div class="form-group mb-3">
                            <label for="usernameaddress">
                                <i class="mdi mdi-account-outline mr-1"></i>
                                Username
                            </label>
                            <input class="form-control" type="text" id="usernameaddress" name="username" required
                                placeholder="Masukkan username Anda" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                Silakan masukkan username yang valid.
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password">
                                    <i class="mdi mdi-lock-outline mr-1"></i>
                                    Password
                                </label>
                                <a href="#" class="text-muted small">Lupa Password?</a>
                            </div>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control"
                                    placeholder="Masukkan password Anda" name="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text password-toggle" onclick="togglePassword()">
                                        <i class="mdi mdi-eye-outline" id="toggleIcon"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    Silakan masukkan password Anda.
                                </div>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                <label class="custom-control-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-login btn-block">
                            <i class="mdi mdi-login mr-1"></i>
                            Masuk
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            © 2025 SPP Apps. Dikembangkan oleh Tim Developer <b>NexusHUB</b>.
                        </p>
                    </div>

                    <!-- Demo Credentials -->
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <strong>Demo Login:</strong><br>
                            Username: admin | Password: admin123<br>
                            Username: bendahara | Password: bendahara123
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js') ?>"></script>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'mdi mdi-eye-off-outline';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'mdi mdi-eye-outline';
            }
        }

        // Bootstrap form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Auto hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
</body>

</html>
