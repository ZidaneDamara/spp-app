<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['tahun', 'semester'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'tahun' => 'required|max_length[9]',
        'semester' => 'required|in_list[Ganjil,Genap]'
    ];

    protected $validationMessages = [
        'tahun' => [
            'required' => 'Tahun ajaran harus diisi',
            'max_length' => 'Tahun ajaran maksimal 9 karakter'
        ],
        'semester' => [
            'required' => 'Semester harus dipilih',
            'in_list' => 'Semester tidak valid'
        ]
    ];
}
