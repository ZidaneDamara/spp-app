<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanSppModel extends Model
{
    protected $table = 'tagihan_spp';
    protected $primaryKey = 'id_tagihan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_siswa', 'id_tahun', 'bulan', 'jumlah', 'statusbayar'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'id_siswa' => 'required|integer',
        'id_tahun' => 'required|integer',
        'bulan' => 'required|max_length[20]',
        'jumlah' => 'required|decimal',
        'statusbayar' => 'required|in_list[belum,lunas]'
    ];

    public function getTagihanWithDetails($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('tagihan_spp.*, siswa.nis, siswa.nama, kelas.nama_kelas, tahun_ajaran.tahun, tahun_ajaran.semester')
            ->join('siswa', 'siswa.id_siswa = tagihan_spp.id_siswa')
            ->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left')
            ->join('tahun_ajaran', 'tahun_ajaran.id_tahun = tagihan_spp.id_tahun');

        if ($id !== null) {
            return $builder->where('tagihan_spp.id_tagihan', $id)->get()->getRowArray();
        }

        return $builder->orderBy('tagihan_spp.id_tagihan', 'DESC')->get()->getResultArray();
    }

    public function getUnpaidBills()
    {
        return $this->db->table($this->table)
            ->select('tagihan_spp.*, siswa.nis, siswa.nama, kelas.nama_kelas, tahun_ajaran.tahun, tahun_ajaran.semester')
            ->join('siswa', 'siswa.id_siswa = tagihan_spp.id_siswa')
            ->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left')
            ->join('tahun_ajaran', 'tahun_ajaran.id_tahun = tagihan_spp.id_tahun')
            ->where('statusbayar', 'belum')
            ->orderBy('tagihan_spp.id_tagihan', 'DESC')
            ->get()->getResultArray();
    }

    public function generateMonthlyBills($tahunId, $bulan, $jumlah, $siswaIds = null)
    {
        $siswaModel = new \App\Models\SiswaModel();
        
        if ($siswaIds === null) {
            $siswaList = $siswaModel->getActiveSiswa();
        } else {
            $siswaList = $siswaModel->whereIn('id_siswa', $siswaIds)->findAll();
        }

        $data = [];
        foreach ($siswaList as $siswa) {
            $existing = $this->where([
                'id_siswa' => $siswa['id_siswa'],
                'id_tahun' => $tahunId,
                'bulan' => $bulan
            ])->first();

            if (!$existing) {
                $data[] = [
                    'id_siswa' => $siswa['id_siswa'],
                    'id_tahun' => $tahunId,
                    'bulan' => $bulan,
                    'jumlah' => $jumlah,
                    'statusbayar' => 'belum'
                ];
            }
        }

        if (!empty($data)) {
            return $this->insertBatch($data);
        }

        return true;
    }

    public function updatePaymentStatus($id, $status = 'lunas')
    {
        return $this->update($id, ['statusbayar' => $status]);
    }
}
