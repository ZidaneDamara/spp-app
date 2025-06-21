<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $db;
    protected $siswaModel;
    protected $tagihanModel;
    protected $pembayaranModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // <-- tambahkan ini bro
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->tagihanModel = new \App\Models\TagihanSppModel();
        $this->pembayaranModel = new \App\Models\PembayaranModel();
    }

    public function index()
    {
        $data = [
            'total_siswa' => $this->siswaModel->where('status', 'aktif')->countAllResults(),
            'total_tagihan_belum' => $this->tagihanModel->where('status_bayar', 'belum')->countAllResults(),
            'total_tagihan_lunas' => $this->tagihanModel->where('status_bayar', 'lunas')->countAllResults(),
            'pembayaran_hari_ini' => $this->getPembayaranHariIni(),
            'recent_payments' => $this->getRecentPayments(),
            'unpaid_bills_summary' => $this->getUnpaidBillsSummary()
        ];

        return view('dashboard', $data);
    }

    private function getPembayaranHariIni()
    {
        $today = date('Y-m-d');
        return $this->pembayaranModel->getPaymentSummary($today, $today);
    }

    private function getRecentPayments()
    {
        return array_slice($this->pembayaranModel->getPembayaranWithDetails(), 0, 5);
    }

    private function getUnpaidBillsSummary()
    {
        return $this->db->table('tagihan_spp')
            ->select('COUNT(*) as jumlah, SUM(jumlah) as total')
            ->where('status_bayar', 'belum')
            ->get()->getRowArray();
    }
}
