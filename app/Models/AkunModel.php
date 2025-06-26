<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'kode', 
        'nama_akun', 
        'id_jenis', 
        'debet', 
        'kredit'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'kode' => 'required|min_length[3]|max_length[20]|is_unique[akun.kode,id_akun,{id_akun}]',
        'nama_akun' => 'required|min_length[3]|max_length[200]',
        'id_jenis' => 'required|integer',
        'debet' => 'permit_empty|decimal',
        'kredit' => 'permit_empty|decimal'
    ];

    protected $validationMessages = [
        'kode' => [
            'required' => 'Kode akun harus diisi',
            'is_unique' => 'Kode akun sudah digunakan'
        ],
        'nama_akun' => [
            'required' => 'Nama akun harus diisi',
            'min_length' => 'Nama akun minimal 3 karakter'
        ],
        'id_jenis' => [
            'required' => 'Jenis akun harus dipilih'
        ]
    ];

    public function getAkunWithJenis()
    {
        return $this->select('akun.*, jenis_akun.nama_jenis')
                   ->join('jenis_akun', 'jenis_akun.id_jenis = akun.id_jenis')
                   ->orderBy('akun.kode', 'ASC')
                   ->findAll();
    }

    public function getAkunById($id)
    {
        return $this->select('akun.*, jenis_akun.nama_jenis')
                   ->join('jenis_akun', 'jenis_akun.id_jenis = akun.id_jenis')
                   ->where('akun.id_akun', $id)
                   ->first();
    }
}