<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliKelasModel extends Model
{
    protected $table            = 'wali_kelas';
    protected $primaryKey       = 'id_walikelas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'nama_user',
        'nip',
        'foto',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama_user' => 'required|string|max_length[100]',
        'nip'       => 'required|integer|is_unique[wali_kelas.nip,id_walikelas,{id_walikelas}]',
        'status'    => 'required|in_list[pns,honorer]',
    ];

    protected $validationMessages = [
        'nama_user' => [
            'required' => 'Nama user harus diisi.',
        ],
        'nip' => [
            'required'   => 'NIP harus diisi.',
            'is_unique' => 'NIP sudah digunakan.',
        ],
        'status' => [
            'required' => 'Status harus dipilih.',
        ],
    ];
}
