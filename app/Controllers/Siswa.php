<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Controllers\BaseController;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'siswa' => $this->siswaModel->getSiswaWithKelas(),
        ];

        return view('siswa/index', $data);
    }

    public function create()
    {
        $data = [
            'kelas' => $this->kelasModel->findAll(),
        ];

        return view('siswa/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        if (!$this->validate($this->siswaModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // upload foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'default.png';
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/siswa', $namaFoto);
        }

        $data = $this->request->getPost();
        $data['foto'] = $namaFoto;

        $this->siswaModel->save($data);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Data siswa tidak ditemukan!');
        }

        $data = [
            'siswa' => $siswa,
            'kelas' => $this->kelasModel->findAll(),
        ];

        return view('siswa/edit', $data);
    }

    public function update($id)
    {
        $siswaLama = $this->siswaModel->find($id);
        if (!$siswaLama) {
            return redirect()->to('/siswa')->with('error', 'Data siswa tidak ditemukan!');
        }

        $validation = \Config\Services::validation();

        $validationRules = [
            'nis' => [
                'rules' => "required|is_unique[siswa.nis,id_siswa,{$id}]",
                'errors' => [
                    'required' => 'NIS harus diisi',
                    'is_unique' => 'NIS sudah digunakan oleh siswa lain',
                ],
            ],
            'nisn' => [
                'rules' => "permit_empty|is_unique[siswa.nisn,id_siswa,{$id}]",
                'errors' => [
                    'is_unique' => 'NISN sudah digunakan oleh siswa lain',
                ],
            ],
            'nama' => 'required|min_length[3]|max_length[100]',
            'kelas_id' => 'required|integer',
            'status' => 'required|in_list[aktif,lulus,keluar,mutasi]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->request->getPost();

        // Upload foto baru kalau ada
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/siswa', $namaFoto);

            // Hapus foto lama kalau bukan default
            if (!empty($siswaLama['foto']) && $siswaLama['foto'] != 'default.png') {
                @unlink('uploads/siswa/' . $siswaLama['foto']);
            }

            $data['foto'] = $namaFoto;
        } else {
            $data['foto'] = $siswaLama['foto'];
        }

        $this->siswaModel->update($id, $data);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil diupdate!');
    }

    public function delete($id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan!');
        }

        // hapus foto jika bukan default
        if ($siswa['foto'] != 'default.png') {
            @unlink('uploads/siswa/' . $siswa['foto']);
        }

        $this->siswaModel->delete($id);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
