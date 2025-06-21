<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nis', 'nama', 'kelas_id', 'status'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nis' => 'required|is_unique[siswa.nis,id_siswa,{id_siswa}]',
        'nama' => 'required|min_length[3]|max_length[100]',
        'kelas_id' => 'required|integer',
        'status' => 'required|in_list[aktif,lulus,keluar]'
    ];

    protected $validationMessages = [
        'nis' => [
            'required' => 'NIS harus diisi',
            'is_unique' => 'NIS sudah terdaftar'
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
            'max_length' => 'Nama maksimal 100 karakter'
        ],
        'kelas_id' => [
            'required' => 'Kelas harus dipilih',
            'integer' => 'Kelas tidak valid'
        ],
        'status' => [
            'required' => 'Status harus dipilih',
            'in_list' => 'Status tidak valid'
        ]
    ];

    // public function getSiswaWithKelas($id = null)
    // {
    //     $builder = $this->db->table($this->table)
    //         ->select('siswa.*, kelas.nama_kelas')
    //         ->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');

    //     if ($id !== null) {
    //         return $builder->where('siswa.id_siswa', $id)->get()->getRowArray();
    //     }

    //     return $builder->get()->getResultArray();
    // }

    public function getActiveSiswa()
    {
        return $this->where('status', 'aktif')->findAll();
    }

    public function getSiswaByKelas($kelasId)
    {
        return $this->where('kelas_id', $kelasId)
            ->where('status', 'aktif')
            ->findAll();
    }
    public function getSiswaWithKelas()
{
    return $this->select('siswa.*, kelas.nama_kelas as kelas')
                ->join('kelas', 'kelas.id_kelas = siswa.kelas_id')
                ->findAll();
}

}
