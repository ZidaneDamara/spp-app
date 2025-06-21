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
    protected $allowedFields = ['nama_kelas', 'tingkat', 'jurusan', 'wali_kelas', 'status', 'created_at', 'updated_at'];

    protected $useTimestamps = true;

    // protected $validationRules = [
    //     'nama_kelas' => 'required|is_unique[kelas.nama_kelas,id_kelas,{id_kelas}]',
    //     'tingkat' => 'required|in_list[X,XI,XII]',
    //     'jurusan' => 'permit_empty|string|max_length[50]',
    //     'wali_kelas' => 'permit_empty|integer|is_not_unique[user.id_user]',
    //     'status' => 'required|in_list[aktif,nonaktif]',
    // ];

    // protected $validationMessages = [
    //     'nama_kelas' => [
    //         'required' => 'Nama kelas harus diisi',
    //         'is_unique' => 'Nama kelas sudah terdaftar',
    //     ],
    //     'tingkat' => [
    //         'required' => 'Tingkat harus diisi',
    //     ],
    //     'jurusan' => [
    //         'required' => 'Jurusan harus diisi',
    //     ],
    //     'status' => [
    //         'required' => 'Status harus diisi',
    //     ],
    // ];

    public function getAllKelasWithWali()
    {
        return $this->db->table('kelas')->select('kelas.*, user.nama_user as wali_nama')->join('user', 'user.id_user = kelas.wali_kelas', 'left')->orderBy('kelas.id_kelas', 'DESC')->get()->getResultArray();
    }
}
