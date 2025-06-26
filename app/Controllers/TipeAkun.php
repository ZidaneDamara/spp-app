<?php

namespace App\Controllers;

use App\Models\JenisAkunModel;
use App\Models\AkunModel;

class TipeAkun extends BaseController
{
    protected $jenisAkunModel;
    protected $akunModel;

    public function __construct()
    {
        $this->jenisAkunModel = new JenisAkunModel();
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jenis Akun',
            'jenis_akun' => $this->jenisAkunModel->orderBy('nama_jenis', 'ASC')->findAll()
        ];

        return view('tipeakun/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Akun'
        ];

        return view('tipeakun/create', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'nama_jenis' => 'required|min_length[2]|max_length[100]|is_unique[jenis_akun.nama_jenis]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_jenis' => $this->request->getPost('nama_jenis')
        ];

        if ($this->jenisAkunModel->save($data)) {
            session()->setFlashdata('success', 'Data jenis akun berhasil ditambahkan');
            return redirect()->to('/tipe-akun');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data jenis akun');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $jenisAkun = $this->jenisAkunModel->find($id);
        
        if (!$jenisAkun) {
            session()->setFlashdata('error', 'Data jenis akun tidak ditemukan');
            return redirect()->to('/tipe-akun');
        }

        $data = [
            'title' => 'Edit Jenis Akun',
            'jenis_akun' => $jenisAkun
        ];

        return view('tipeakun/edit', $data);
    }

    public function update($id)
    {
        $jenisAkun = $this->jenisAkunModel->find($id);
        
        if (!$jenisAkun) {
            session()->setFlashdata('error', 'Data jenis akun tidak ditemukan');
            return redirect()->to('/tipe-akun');
        }

        // Validasi input
        $rules = [
            'nama_jenis' => "required|min_length[2]|max_length[100]|is_unique[jenis_akun.nama_jenis,id_jenis,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_jenis' => $this->request->getPost('nama_jenis')
        ];

        if ($this->jenisAkunModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data jenis akun berhasil diupdate');
            return redirect()->to('/tipe-akun');
        } else {
            session()->setFlashdata('error', 'Gagal mengupdate data jenis akun');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $jenisAkun = $this->jenisAkunModel->find($id);
        
        if (!$jenisAkun) {
            session()->setFlashdata('error', 'Data jenis akun tidak ditemukan');
            return redirect()->to('/tipe-akun');
        }

        // Cek apakah jenis akun masih digunakan di tabel akun
        $countAkun = $this->akunModel->where('id_jenis', $id)->countAllResults();
        
        if ($countAkun > 0) {
            session()->setFlashdata('error', "Jenis akun tidak dapat dihapus karena masih digunakan oleh {$countAkun} akun");
            return redirect()->to('/tipe-akun');
        }

        if ($this->jenisAkunModel->delete($id)) {
            session()->setFlashdata('success', 'Data jenis akun berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data jenis akun');
        }

        return redirect()->to('/tipe-akun');
    }

    public function show($id)
    {
        $jenisAkun = $this->jenisAkunModel->find($id);
        
        if (!$jenisAkun) {
            session()->setFlashdata('error', 'Data jenis akun tidak ditemukan');
            return redirect()->to('/tipe-akun');
        }

        // Ambil semua akun yang menggunakan jenis akun ini
        $akunList = $this->akunModel->where('id_jenis', $id)->findAll();

        $data = [
            'title' => 'Detail Jenis Akun',
            'jenis_akun' => $jenisAkun,
            'akun_list' => $akunList,
            'total_akun' => count($akunList)
        ];

        return view('tipeakun/show', $data);
    }

    // API untuk mendapatkan jenis akun (untuk AJAX)
    public function getJenisAkun()
    {
        if ($this->request->isAJAX()) {
            $jenisAkun = $this->jenisAkunModel->findAll();
            return $this->response->setJSON($jenisAkun);
        }
        
        return $this->response->setStatusCode(404);
    }
}