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
            
            'siswa' => $this->siswaModel->getSiswaWithKelas()
        ];

        return view('siswa/index', $data);
    }

    public function create()
    {
        $data = [
            'kelas' => $this->kelasModel->findAll()
        ];

        return view('siswa/create', $data);
    }

    public function store()
    {
        if (!$this->siswaModel->save($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->siswaModel->errors());
        }

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Data siswa tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Siswa',
            'breadcrumb' => [
                ['title' => 'Master Data', 'url' => '#'],
                ['title' => 'Data Siswa', 'url' => base_url('siswa')],
                ['title' => 'Edit Siswa']
            ],
            'siswa' => $siswa,
            'kelas' => $this->kelasModel->findAll()
        ];

        return view('siswa/edit', $data);
    }

    public function update($id)
    {
        if (!$this->siswaModel->update($id, $this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->siswaModel->errors());
        }

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil diupdate!');
    }

    public function delete($id)
    {
        if (!$this->siswaModel->delete($id)) {
            return redirect()->back()->with('error', 'Gagal menghapus data siswa!');
        }

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
