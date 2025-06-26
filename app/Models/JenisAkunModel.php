<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisAkunModel extends Model
{
    protected $table = 'jenis_akun';
    protected $primaryKey = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama_jenis'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'nama_jenis' => 'required|min_length[2]|max_length[100]|is_unique[jenis_akun.nama_jenis,id_jenis,{id_jenis}]',
    ];

    protected $validationMessages = [
        'nama_jenis' => [
            'required' => 'Nama jenis akun harus diisi',
            'min_length' => 'Nama jenis akun minimal 2 karakter',
            'max_length' => 'Nama jenis akun maksimal 100 karakter',
            'is_unique' => 'Nama jenis akun sudah digunakan'
        ]
    ];
}