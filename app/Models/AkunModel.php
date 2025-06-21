<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'IDUser';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['kode_akun', 'nama_akun', 'tipe', 'level', 'parent_id'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'kode_akun' => 'required|is_unique[akun.kode_akun,IDUser,{IDUser}]',
        'nama_akun' => 'required',
        'tipe' => 'required|in_list[aktiva,pasiva,modal,pendapatan,beban]',
        'level' => 'required|integer'
    ];

    public function getAkunHierarchy()
    {
        return $this->orderBy('kode_akun', 'ASC')->findAll();
    }

    public function getAkunByTipe($tipe)
    {
        return $this->where('tipe', $tipe)->orderBy('kode_akun', 'ASC')->findAll();
    }
}
