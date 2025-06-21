<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;
use App\Models\JurnalModel;
use App\Models\TagihanSppModel;
use App\Models\JurnalDetailModel;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_tagihan', 'tanggal_bayar', 'jumlah_bayar', 'metode_bayar', 'keterangan', 'id_jurnal'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'id_tagihan' => 'required|integer',
        'tanggal_bayar' => 'required|valid_date',
        'jumlah_bayar' => 'required|decimal',
        'metode_bayar' => 'required|max_length[50]'
    ];

    public function getPembayaranWithDetails($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('pembayaran.*, tagihan_spp.bulan, tagihan_spp.jumlah as jumlah_tagihan, 
                     siswa.nis, siswa.nama, kelas.nama_kelas, 
                     tahun_ajaran.tahun, tahun_ajaran.semester')
            ->join('tagihan_spp', 'tagihan_spp.id_tagihan = pembayaran.id_tagihan')
            ->join('siswa', 'siswa.id_siswa = tagihan_spp.id_siswa')
            ->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left')
            ->join('tahun_ajaran', 'tahun_ajaran.id_tahun = tagihan_spp.id_tahun');

        if ($id !== null) {
            return $builder->where('pembayaran.id_pembayaran', $id)->get()->getRowArray();
        }

        return $builder->orderBy('pembayaran.tanggal_bayar', 'DESC')->get()->getResultArray();
    }

    public function processPayment($data)
    {
        $db = Database::connect();
        $db->transStart();

        try {
            $this->insert($data);
            $paymentId = $this->getInsertID();

            $tagihanModel = new TagihanSppModel();
            $tagihan = $tagihanModel->getTagihanWithDetails($data['id_tagihan']);

            $jurnalModel = new JurnalModel();
            $jurnalData = [
                'tanggal' => $data['tanggal_bayar'],
                'keterangan' => 'Pembayaran SPP ' . $tagihan['bulan'] . ' - ' . $tagihan['nama'],
                'ref' => 'BAYAR' . $tagihan['nis'] . '-' . strtoupper(substr($tagihan['bulan'], 0, 3)) . date('y', strtotime($data['tanggal_bayar'])),
                'jenis' => 'otomatis'
            ];

            $jurnalModel->insert($jurnalData);
            $jurnalId = $jurnalModel->getInsertID();

            $jurnalDetailModel = new JurnalDetailModel();
            
            $jurnalDetailModel->insert([
                'id_jurnal' => $jurnalId,
                'id_akun' => 1,
                'debit' => $data['jumlah_bayar'],
                'kredit' => 0
            ]);

            $jurnalDetailModel->insert([
                'id_jurnal' => $jurnalId,
                'id_akun' => 2,
                'debit' => 0,
                'kredit' => $data['jumlah_bayar']
            ]);

            $this->update($paymentId, ['id_jurnal' => $jurnalId]);
            $tagihanModel->updatePaymentStatus($data['id_tagihan'], 'lunas');

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            return $paymentId;

        } catch (\Exception $e) {
            $db->transRollback();
            throw $e;
        }
    }

    public function getPaymentSummary($startDate, $endDate)
    {
        return $this->db->table($this->table)
            ->selectSum('jumlah_bayar', 'total_pembayaran')
            ->selectCount('id_pembayaran', 'jumlah_transaksi')
            ->where('tanggal_bayar >=', $startDate)
            ->where('tanggal_bayar <=', $endDate)
            ->get()->getRowArray();
    }
}
