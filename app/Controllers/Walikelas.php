<?php

namespace App\Controllers;

use App\Models\WaliKelasModel;
use App\Controllers\BaseController;

class Walikelas extends BaseController
{
    protected $waliKelasModel;

    public function __construct()
    {
        $this->waliKelasModel = new WaliKelasModel();
    }

    public function index()
    {
        $data = [
            'wali_kelas' => $this->waliKelasModel->findAll(),
        ];

        return view('walikelas/index', $data);
    }

    public function create()
    {
        return view('walikelas/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_user' => 'required|min_length[3]',
            'nip' => 'required|is_unique[wali_kelas.nip]',
            'foto' => 'permit_empty|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Upload foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'default.png';
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/walikelas', $namaFoto);
        }

        $this->waliKelasModel->save([
            'nama_user' => $this->request->getPost('nama_user'),
            'nip' => $this->request->getPost('nip'),
            'status' => $this->request->getPost('status'),
            'foto' => $namaFoto,
        ]);

        return redirect()->to('/walikelas')->with('success', 'Data wali kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $wali = $this->waliKelasModel->find($id);
        if (!$wali) {
            return redirect()->to('/walikelas')->with('error', 'Data tidak ditemukan!');
        }

        return view('walikelas/edit', ['wali' => $wali]);
    }

    public function update($id)
    {
        $waliLama = $this->waliKelasModel->find($id);
        if (!$waliLama) {
            return redirect()->to('/walikelas')->with('error', 'Data tidak ditemukan!');
        }

        $rules = [
            'nama_user' => 'required|min_length[3]',
            'nip' => "required|is_unique[wali_kelas.nip,id_walikelas,$id]",
            'foto' => 'permit_empty|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Upload baru jika ada
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/walikelas', $namaFoto);

            if (!empty($waliLama['foto']) && $waliLama['foto'] != 'default.png') {
                @unlink('uploads/walikelas/' . $waliLama['foto']);
            }

            $data['foto'] = $namaFoto;
        } else {
            $data['foto'] = $waliLama['foto'];
        }

        $this->waliKelasModel->update($id, $data);

        return redirect()->to('/walikelas')->with('success', 'Data wali kelas berhasil diupdate!');
    }

    public function delete($id)
    {
        $wali = $this->waliKelasModel->find($id);
        if (!$wali) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        if ($wali['foto'] != 'default.png') {
            @unlink('uploads/walikelas/' . $wali['foto']);
        }

        $this->waliKelasModel->delete($id);

        return redirect()->to('/walikelas')->with('success', 'Data wali kelas berhasil dihapus!');
    }
}
