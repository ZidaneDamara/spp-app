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

    protected $allowedFields = ['nama_kelas', 'tingkat', 'jurusan', 'id_wali_kelas', 'status', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nama_kelas' => 'required|is_unique[kelas.nama_kelas,id_kelas,{id_kelas}]',
        'tingkat' => 'required|in_list[X,XI,XII]',
        'jurusan' => 'permit_empty|max_length[50]',
        'id_wali_kelas' => 'permit_empty|integer|is_not_unique[wali_kelas.id_walikelas]',
        'status' => 'required|in_list[aktif,nonaktif]',
    ];

    protected $validationMessages = [
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi.',
            'is_unique' => 'Nama kelas sudah digunakan.',
        ],
        'tingkat' => [
            'required' => 'Tingkat harus diisi.',
        ],
        'status' => [
            'required' => 'Status kelas harus diisi.',
        ],
    ];

    public function getAllKelasWithWali()
    {
        return $this->db->table($this->table)->select('kelas.*, wali_kelas.nama_user AS wali_nama')->join('wali_kelas', 'wali_kelas.id_walikelas = kelas.id_wali_kelas', 'left')->orderBy('kelas.id_kelas', 'DESC')->get()->getResultArray();
    }
}
