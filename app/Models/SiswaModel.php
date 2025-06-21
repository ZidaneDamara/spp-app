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
    protected $useTimestamps = false;

    // Kolom yang boleh diisi
    protected $allowedFields = ['nis', 'nisn', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp', 'email', 'nama_ayah', 'nama_ibu', 'no_hp_ortu', 'kelas_id', 'tahun_masuk', 'status', 'foto', 'created_at', 'updated_at'];

    // Validasi
    protected $validationRules = [
        'nis' => 'required|is_unique[siswa.nis,id_siswa,{id_siswa}]',
        'nisn' => 'permit_empty|is_unique[siswa.nisn,id_siswa,{id_siswa}]',
        'nama' => 'required|min_length[3]|max_length[100]',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'kelas_id' => 'required|integer',
        'tahun_masuk' => 'required|numeric|exact_length[4]',
        'status' => 'required|in_list[aktif,lulus,keluar,mutasi]',
    ];

    protected $validationMessages = [
        'nis' => [
            'required' => 'NIS harus diisi',
            'is_unique' => 'NIS sudah terdaftar',
        ],
        'nisn' => [
            'is_unique' => 'NISN sudah terdaftar',
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
            'max_length' => 'Nama maksimal 100 karakter',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih',
            'in_list' => 'Jenis kelamin tidak valid',
        ],
        'kelas_id' => [
            'required' => 'Kelas harus dipilih',
            'integer' => 'Kelas tidak valid',
        ],
        'tahun_masuk' => [
            'required' => 'Tahun masuk harus diisi',
            'numeric' => 'Tahun masuk harus angka',
            'exact_length' => 'Tahun masuk harus 4 digit',
        ],
        'status' => [
            'required' => 'Status harus dipilih',
            'in_list' => 'Status tidak valid',
        ],
    ];

    // Ambil siswa aktif
    public function getActiveSiswa()
    {
        return $this->where('status', 'aktif')->findAll();
    }

    // Ambil siswa berdasarkan kelas
    public function getSiswaByKelas($kelasId)
    {
        return $this->where('kelas_id', $kelasId)->where('status', 'aktif')->findAll();
    }

    // Ambil semua siswa + nama kelas
    public function getSiswaWithKelas()
    {
        return $this->select('siswa.*, kelas.nama_kelas as kelas')->join('kelas', 'kelas.id_kelas = siswa.kelas_id')->orderBy('id_siswa', 'DESC')->findAll();
    }
}
