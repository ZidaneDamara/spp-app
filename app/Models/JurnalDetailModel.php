<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalDetailModel extends Model
{
    protected $table = 'jurnal_detail';
    protected $primaryKey = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_jurnal', 'id_akun', 'debit', 'kredit'];

    protected $useTimestamps = false;

    public function getDetailsByJurnal($jurnalId)
    {
        return $this->db->table($this->table)
            ->select('jurnal_detail.*, akun.kode_akun, akun.nama_akun')
            ->join('akun', 'akun.IDUser = jurnal_detail.id_akun')
            ->where('id_jurnal', $jurnalId)
            ->get()->getResultArray();
    }
}
