<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // pastikan ini kolom yang sesuai di tabel
    protected $allowedFields    = [
        'username', 'password', 'nama_user', 'role', 'foto', 'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Tidak perlu pakai $beforeInsert / $beforeUpdate kalau password sudah di-hash dari Controller

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getActiveUsers()
    {
        return $this->where('status', 'aktif')->findAll();
    }

    public function getValidationRulesCreate()
    {
        return [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'is_unique' => 'Username sudah digunakan.',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required'   => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 6 karakter.',
                ],
            ],
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama user wajib diisi.',
                    'min_length' => 'Nama user minimal 3 karakter.',
                ],
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|in_list[admin,bendahara,operator]',
                'errors' => [
                    'required' => 'Role wajib dipilih.',
                    'in_list'  => 'Role tidak valid.',
                ],
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib dipilih.',
                ],
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'if_exist|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
                'errors' => [
                    'is_image'  => 'File harus berupa gambar.',
                    'mime_in'   => 'Format gambar harus JPG/JPEG/PNG.',
                    'max_size'  => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ];
    }

    public function getValidationRulesUpdate($id)
    {
        return [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username,id_user,' . $id . ']',
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'is_unique' => 'Username sudah digunakan.',
                ],
            ],
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama user wajib diisi.',
                    'min_length' => 'Nama user minimal 3 karakter.',
                ],
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|in_list[admin,bendahara,operator]',
                'errors' => [
                    'required' => 'Role wajib dipilih.',
                    'in_list'  => 'Role tidak valid.',
                ],
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib dipilih.',
                ],
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'if_exist|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
                'errors' => [
                    'is_image'  => 'File harus berupa gambar.',
                    'mime_in'   => 'Format gambar harus JPG/JPEG/PNG.',
                    'max_size'  => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ];
    }
}
