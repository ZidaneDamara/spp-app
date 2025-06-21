<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Auth::index');

// Authentication routes - direct login
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Dashboard
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Master Data routes

    // Siswa
    $routes->get('siswa', 'Siswa::index', ['filter' => 'auth']);
    $routes->get('siswa/create', 'Siswa::create', ['filter' => 'auth']);
    $routes->post('siswa/store', 'Siswa::store', ['filter' => 'auth']);
    $routes->get('siswa/edit/(:num)', 'Siswa::edit/$1', ['filter' => 'auth']);
    $routes->post('siswa/update/(:num)', 'Siswa::update/$1', ['filter' => 'auth']);
    $routes->delete('siswa/delete/(:num)', 'Siswa::delete/$1', ['filter' => 'auth']);
    
    // Kelas
    $routes->get('kelas', 'Kelas::index', ['filter' => 'auth']);
    $routes->get('kelas/create', 'Kelas::create', ['filter' => 'auth']);
    $routes->post('kelas/store', 'Kelas::store', ['filter' => 'auth']);
    $routes->get('kelas/edit/(:num)', 'Kelas::edit/$1', ['filter' => 'auth']);
    $routes->post('kelas/update/(:num)', 'Kelas::update/$1', ['filter' => 'auth']);
    $routes->delete('kelas/delete/(:num)', 'Kelas::delete/$1', ['filter' => 'auth']);
    
    // Tahun Ajaran
    $routes->get('tahun-ajaran', 'TahunAjaran::index', ['filter' => 'auth']);
    $routes->post('tahun-ajaran/store', 'TahunAjaran::store', ['filter' => 'auth']);
    $routes->post('tahun-ajaran/update/(:num)', 'TahunAjaran::update/$1', ['filter' => 'auth']);
    $routes->delete('tahun-ajaran/delete/(:num)', 'TahunAjaran::delete/$1', ['filter' => 'auth']);
    
    // User
    $routes->get('user', 'User::index', ['filter' => 'auth']);
    $routes->get('user/create', 'User::create', ['filter' => 'auth']);
    $routes->post('user/store', 'User::store', ['filter' => 'auth']);
    $routes->get('user/edit/(:num)', 'User::edit/$1', ['filter' => 'auth']);
    $routes->post('user/update/(:num)', 'User::update/$1', ['filter' => 'auth']);
    $routes->delete('user/delete/(:num)', 'User::delete/$1', ['filter' => 'auth']);

// SPP Management routes
$routes->group('spp', ['filter' => 'auth'], function($routes) {
    // Tagihan
    $routes->get('tagihan', 'Spp\Tagihan::index');
    $routes->get('tagihan/create', 'Spp\Tagihan::create');
    $routes->post('tagihan/store', 'Spp\Tagihan::store');
    $routes->post('tagihan/generate', 'Spp\Tagihan::generate');
    $routes->get('tagihan/detail/(:num)', 'Spp\Tagihan::detail/$1');
    
    // Pembayaran
    $routes->get('pembayaran', 'Spp\Pembayaran::index');
    $routes->get('pembayaran/create/(:num)', 'Spp\Pembayaran::create/$1');
    $routes->post('pembayaran/store', 'Spp\Pembayaran::store');
    $routes->get('pembayaran/detail/(:num)', 'Spp\Pembayaran::detail/$1');
    $routes->get('pembayaran/print/(:num)', 'Spp\Pembayaran::print/$1');
});

// Accounting routes
$routes->group('akuntansi', ['filter' => 'auth'], function($routes) {
    $routes->get('akun', 'Akuntansi\Akun::index');
    $routes->post('akun/store', 'Akuntansi\Akun::store');
    $routes->post('akun/update/(:num)', 'Akuntansi\Akun::update/$1');
    $routes->delete('akun/delete/(:num)', 'Akuntansi\Akun::delete/$1');
    
    $routes->get('jurnal', 'Akuntansi\Jurnal::index');
    $routes->get('jurnal/detail/(:num)', 'Akuntansi\Jurnal::detail/$1');
    $routes->post('jurnal/approve/(:num)', 'Akuntansi\Jurnal::approve/$1');
});

// Reports routes
$routes->group('laporan', ['filter' => 'auth'], function($routes) {
    $routes->get('pembayaran', 'Laporan\Pembayaran::index');
    $routes->get('tunggakan', 'Laporan\Tunggakan::index');
    $routes->get('keuangan', 'Laporan\Keuangan::index');
    $routes->get('jurnal', 'Laporan\Jurnal::index');
});
