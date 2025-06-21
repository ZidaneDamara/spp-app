<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'user' => $this->userModel->orderBy('id_user', 'DESC')->findAll(),
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate($this->userModel->getValidationRulesCreate())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama_user' => $this->request->getPost('nama_user'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status'),
        ];

        // hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // upload foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/foto', $namaFoto);
            $data['foto'] = $namaFoto;
        } else {
            $data['foto'] = 'default.png';
        }

        $this->userModel->save($data);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/user')->with('error', 'Data tidak ditemukan');
        }

        return view('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        if (!$this->validate($this->userModel->getValidationRulesUpdate($id))) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_user' => $this->request->getPost('nama_user'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status'),
        ];

        // Kalau password diisi, hash dan update
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Upload foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $userLama = $this->userModel->find($id);
            if ($userLama && $userLama['foto'] != 'default.png') {
                @unlink('uploads/foto/' . $userLama['foto']);
            }

            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/foto', $namaFoto);
            $data['foto'] = $namaFoto;

            if (session()->get('id_user') == $id) {
                session()->set('foto', $namaFoto);
            }
        }

        // Update ke database
        $this->userModel->update($id, $data);

        // Jika user yang diedit adalah user yang sedang login, update session-nya
        if (session()->get('id_user') == $id) {
            if (isset($data['foto'])) {
                session()->set('foto', $data['foto']);
            }
            if (isset($data['nama_user'])) {
                session()->set('nama_user', $data['nama_user']);
            }
        }

        return redirect()->to('/user')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user')->with('success', 'Data berhasil dihapus');
    }
}
