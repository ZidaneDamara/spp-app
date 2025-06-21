<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka, $prefix = 'Rp ')
    {
        return $prefix . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('format_tanggal')) {
    function format_tanggal($tanggal, $format = 'd/m/Y')
    {
        return date($format, strtotime($tanggal));
    }
}

if (!function_exists('get_bulan_indonesia')) {
    function get_bulan_indonesia($bulan = null)
    {
        $bulan_indonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        if ($bulan === null) {
            return $bulan_indonesia;
        }

        return $bulan_indonesia[$bulan - 1] ?? '';
    }
}

if (!function_exists('get_status_badge')) {
    function get_status_badge($status)
    {
        switch ($status) {
            case 'aktif':
                return '<span class="badge bg-success">Aktif</span>';
            case 'lulus':
                return '<span class="badge bg-primary">Lulus</span>';
            case 'keluar':
                return '<span class="badge bg-danger">Keluar</span>';
            case 'lunas':
                return '<span class="badge bg-success">Lunas</span>';
            case 'belum':
                return '<span class="badge bg-warning">Belum Lunas</span>';
            default:
                return '<span class="badge bg-secondary">' . ucfirst($status) . '</span>';
        }
    }
}

if (!function_exists('generate_kode_pembayaran')) {
    function generate_kode_pembayaran($nis, $bulan)
    {
        return 'BAYAR' . $nis . '-' . strtoupper(substr($bulan, 0, 3)) . date('y');
    }
}
