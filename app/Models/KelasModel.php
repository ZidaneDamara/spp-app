<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama_kelas'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nama_kelas' => 'required|is_unique[kelas.nama_kelas,id_kelas,{id_kelas}]'
    ];

    protected $validationMessages = [
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi',
            'is_unique' => 'Nama kelas sudah terdaftar'
        ]
    ];

    public function getKelasWithSiswaCount()
    {
        return $this->db->table($this->table)
            ->select('kelas.*, COUNT(siswa.id_siswa) as jumlah_siswa')
            ->join('siswa', 'siswa.kelas_id = kelas.id_kelas AND siswa.status = "aktif"', 'left')
            ->groupBy('kelas.id_kelas')
            ->get()->getResultArray();
    }
}
