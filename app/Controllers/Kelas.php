<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\WaliKelasModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    protected $waliKelasModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->waliKelasModel = new WaliKelasModel();
    }

    // Tampil Data
    public function index()
    {
        $data = [
            'kelas' => $this->kelasModel->getAllKelasWithWali(),
        ];

        return view('kelas/index', $data);
    }

    // Tampil Form Tambah
    public function create()
    {
        // Ambil semua ID wali kelas yang sudah digunakan di tabel kelas
        $usedWaliKelas = $this->kelasModel->select('id_wali_kelas')->where('id_wali_kelas IS NOT NULL')->findAll();

        $usedIds = array_column($usedWaliKelas, 'id_wali_kelas');

        // Ambil semua wali kelas yang belum dipakai
        $waliKelasList = empty($usedIds) ? $this->waliKelasModel->findAll() : $this->waliKelasModel->whereNotIn('id_walikelas', $usedIds)->findAll();

        $data = [
            'wali_kelas' => $waliKelasList,
        ];

        return view('kelas/create', $data);
    }

    // Simpan Data Baru
    public function store()
    {
        $rules = [
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas]',
            'tingkat' => 'required|in_list[X,XI,XII]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->kelasModel->save([
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'id_wali_kelas' => $this->request->getPost('id_wali_kelas'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    // Tampil Form Edit
    public function edit($id)
    {
        $kelas = $this->kelasModel
            ->select('*') // pastikan semua kolom diambil
            ->find($id);

        if (!$kelas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kelas tidak ditemukan.');
        }

        // Ambil semua wali kelas yang sudah dipakai di kelas lain
        $usedWaliKelas = $this->kelasModel->select('id_wali_kelas')->where('id_kelas !=', $id)->where('id_wali_kelas IS NOT NULL')->findAll();

        $usedIds = array_column($usedWaliKelas, 'id_wali_kelas');

        // Ambil wali yang belum dipakai ATAU wali yang sekarang sedang dipakai di kelas ini
        $waliKelasList = empty($usedIds)
            ? $this->waliKelasModel->findAll()
            : $this->waliKelasModel
                ->groupStart()
                ->whereNotIn('id_walikelas', $usedIds)
                ->orWhere('id_walikelas', $kelas['id_wali_kelas']) // tetap tampilkan wali yang sekarang
                ->groupEnd()
                ->findAll();

        $data = [
            'kelas' => $kelas,
            'wali_kelas' => $waliKelasList,
        ];

        return view('kelas/edit', $data);
    }

    // Proses Update Data
    public function update($id)
    {
        $rules = [
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas,id_kelas,' . $id . ']',
            'tingkat' => 'required|in_list[X,XI,XII]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->kelasModel->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'id_wali_kelas' => $this->request->getPost('id_wali_kelas'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil diupdate.');
    }

    // Hapus Data
    public function destroy($id)
    {
        $this->kelasModel->delete($id);
        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}
