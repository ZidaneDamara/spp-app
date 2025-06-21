<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    protected $userModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->userModel = new UserModel();
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
        // Ambil guru yang belum jadi wali_kelas di kelas manapun
        $wali_kelas = $this->userModel
            ->where('role', 'guru')
            ->whereNotIn('id_user', function ($builder) {
                return $builder->select('wali_kelas')->from('kelas')->where('wali_kelas IS NOT NULL');
            })
            ->findAll();

        $data = [
            'wali_kelas' => $wali_kelas,
        ];

        return view('kelas/create', $data);
    }

    // Simpan Data Baru
    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas]',
            'tingkat' => 'required|in_list[X,XI,XII]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->kelasModel->save([
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    // Tampil Form Edit
    public function edit($id)
    {
        $kelas = $this->kelasModel->find($id);

        if (!$kelas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kelas tidak ditemukan.');
        }

        $data = [
            'kelas' => $kelas,
            'wali_kelas' => $this->userModel->where('role', 'guru')->findAll(),
        ];

        return view('kelas/edit', $data);
    }

    // Proses Update Data
    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas,id_kelas,' . $id . ']',
            'tingkat' => 'required|in_list[X,XI,XII]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->kelasModel->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
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
