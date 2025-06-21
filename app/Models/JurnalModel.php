<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['tanggal', 'keterangan', 'ref', 'jenis', 'approve', 'IDUser'];

    protected $useTimestamps = false;

    public function getJurnalWithDetails($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('jurnal.*, user.namauser')
            ->join('user', 'user.IDUser = jurnal.IDUser', 'left');

        if ($id !== null) {
            return $builder->where('jurnal.id_jurnal', $id)->get()->getRowArray();
        }

        return $builder->orderBy('jurnal.tanggal', 'DESC')->get()->getResultArray();
    }
}
