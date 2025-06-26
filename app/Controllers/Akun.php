<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\JenisAkunModel;

class Akun extends BaseController
{
    protected $akunModel;
    protected $jenisAkunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->jenisAkunModel = new JenisAkunModel();
    }

    public function index()
    {
        // Ambil parameter filter dari query string
        $jenisFilter = $this->request->getGet('jenis');
        $search = $this->request->getGet('search');

        $builder = $this->akunModel->select('akun.*, jenis_akun.nama_jenis')
                                  ->join('jenis_akun', 'jenis_akun.id_jenis = akun.id_jenis');

        // Filter berdasarkan jenis akun
        if ($jenisFilter) {
            $builder->where('akun.id_jenis', $jenisFilter);
        }

        // Filter berdasarkan pencarian
        if ($search) {
            $builder->groupStart()
                   ->like('akun.kode', $search)
                   ->orLike('akun.nama_akun', $search)
                   ->orLike('jenis_akun.nama_jenis', $search)
                   ->groupEnd();
        }

        $akun = $builder->orderBy('akun.kode', 'ASC')->findAll();

        // Hitung total saldo
        $totalDebet = array_sum(array_column($akun, 'debet'));
        $totalKredit = array_sum(array_column($akun, 'kredit'));

        $data = [
            'title' => 'Data Akun',
            'akun' => $akun,
            'jenis_akun_filter' => $this->jenisAkunModel->findAll(),
            'current_filter' => $jenisFilter,
            'current_search' => $search,
            'total_debet' => $totalDebet,
            'total_kredit' => $totalKredit,
            'total_akun' => count($akun)
        ];

        return view('akun/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Akun',
            'jenis_akun' => $this->jenisAkunModel->orderBy('nama_jenis', 'ASC')->findAll()
        ];

        return view('akun/create', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'kode' => 'required|min_length[3]|max_length[20]|is_unique[akun.kode]',
            'nama_akun' => 'required|min_length[3]|max_length[200]',
            'id_jenis' => 'required|integer|is_not_unique[jenis_akun.id_jenis]',
            'debet' => 'permit_empty|decimal|greater_than_equal_to[0]',
            'kredit' => 'permit_empty|decimal|greater_than_equal_to[0]'
        ];

        $messages = [
            'kode' => [
                'required' => 'Kode akun harus diisi',
                'is_unique' => 'Kode akun sudah digunakan'
            ],
            'nama_akun' => [
                'required' => 'Nama akun harus diisi',
                'min_length' => 'Nama akun minimal 3 karakter'
            ],
            'id_jenis' => [
                'required' => 'Jenis akun harus dipilih',
                'is_not_unique' => 'Jenis akun tidak valid'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama_akun' => $this->request->getPost('nama_akun'),
            'id_jenis' => $this->request->getPost('id_jenis'),
            'debet' => $this->request->getPost('debet') ?: 0,
            'kredit' => $this->request->getPost('kredit') ?: 0
        ];

        if ($this->akunModel->save($data)) {
            session()->setFlashdata('success', 'Data akun berhasil ditambahkan');
            return redirect()->to('/akun');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data akun');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $akun = $this->akunModel->getAkunById($id);
        
        if (!$akun) {
            session()->setFlashdata('error', 'Data akun tidak ditemukan');
            return redirect()->to('/akun');
        }

        $data = [
            'title' => 'Detail Akun',
            'akun' => $akun
        ];

        return view('akun/show', $data);
    }

    public function edit($id)
    {
        $akun = $this->akunModel->find($id);
        
        if (!$akun) {
            session()->setFlashdata('error', 'Data akun tidak ditemukan');
            return redirect()->to('/akun');
        }

        $data = [
            'title' => 'Edit Akun',
            'akun' => $akun,
            'jenis_akun' => $this->jenisAkunModel->orderBy('nama_jenis', 'ASC')->findAll()
        ];

        return view('akun/edit', $data);
    }

    public function update($id)
    {
        $akun = $this->akunModel->find($id);
        
        if (!$akun) {
            session()->setFlashdata('error', 'Data akun tidak ditemukan');
            return redirect()->to('/akun');
        }

        // Validasi input
        $rules = [
            'kode' => "required|min_length[3]|max_length[20]|is_unique[akun.kode,id_akun,{$id}]",
            'nama_akun' => 'required|min_length[3]|max_length[200]',
            'id_jenis' => 'required|integer|is_not_unique[jenis_akun.id_jenis]',
            'debet' => 'permit_empty|decimal|greater_than_equal_to[0]',
            'kredit' => 'permit_empty|decimal|greater_than_equal_to[0]'
        ];

        $messages = [
            'kode' => [
                'required' => 'Kode akun harus diisi',
                'is_unique' => 'Kode akun sudah digunakan'
            ],
            'nama_akun' => [
                'required' => 'Nama akun harus diisi',
                'min_length' => 'Nama akun minimal 3 karakter'
            ],
            'id_jenis' => [
                'required' => 'Jenis akun harus dipilih',
                'is_not_unique' => 'Jenis akun tidak valid'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama_akun' => $this->request->getPost('nama_akun'),
            'id_jenis' => $this->request->getPost('id_jenis'),
            'debet' => $this->request->getPost('debet') ?: 0,
            'kredit' => $this->request->getPost('kredit') ?: 0
        ];

        if ($this->akunModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data akun berhasil diupdate');
            return redirect()->to('/akun');
        } else {
            session()->setFlashdata('error', 'Gagal mengupdate data akun');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $akun = $this->akunModel->find($id);
        
        if (!$akun) {
            session()->setFlashdata('error', 'Data akun tidak ditemukan');
            return redirect()->to('/akun');
        }

        // Cek apakah akun masih digunakan di transaksi (jurnal_detail, dll)
        // Anda bisa menambahkan pengecekan ke tabel lain yang menggunakan akun ini
        
        if ($this->akunModel->delete($id)) {
            session()->setFlashdata('success', 'Data akun berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data akun');
        }

        return redirect()->to('/akun');
    }

    public function import()
    {
        $data = [
            'title' => 'Import Data Akun'
        ];

        return view('akun/import', $data);
    }

    public function processImport()
    {
        $file = $this->request->getFile('file_excel');
        
        if (!$file->isValid()) {
            session()->setFlashdata('error', 'File tidak valid');
            return redirect()->back();
        }

        // Proses import Excel/CSV
        // Implementasi sesuai kebutuhan
        
        session()->setFlashdata('success', 'Data berhasil diimport');
        return redirect()->to('/akun');
    }

    public function export()
    {
        // Export data akun ke Excel/PDF
        $akun = $this->akunModel->getAkunWithJenis();
        
        // Implementasi export sesuai kebutuhan
        
        return redirect()->to('/akun');
    }

    // API untuk mendapatkan akun berdasarkan jenis (untuk AJAX)
    public function getAkunByJenis($jenisId)
    {
        if ($this->request->isAJAX()) {
            $akun = $this->akunModel->where('id_jenis', $jenisId)->findAll();
            return $this->response->setJSON($akun);
        }
        
        return $this->response->setStatusCode(404);
    }

    // API untuk pencarian akun (untuk autocomplete)
    public function searchAkun()
    {
        if ($this->request->isAJAX()) {
            $term = $this->request->getGet('term');
            
            $akun = $this->akunModel->select('id_akun, kode, nama_akun')
                                   ->like('kode', $term)
                                   ->orLike('nama_akun', $term)
                                   ->limit(10)
                                   ->findAll();
            
            return $this->response->setJSON($akun);
        }
        
        return $this->response->setStatusCode(404);
    }

    // Method untuk reset saldo akun
    public function resetSaldo($id)
    {
        $akun = $this->akunModel->find($id);
        
        if (!$akun) {
            session()->setFlashdata('error', 'Data akun tidak ditemukan');
            return redirect()->to('/akun');
        }

        $data = [
            'debet' => 0,
            'kredit' => 0
        ];

        if ($this->akunModel->update($id, $data)) {
            session()->setFlashdata('success', 'Saldo akun berhasil direset');
        } else {
            session()->setFlashdata('error', 'Gagal mereset saldo akun');
        }

        return redirect()->to('/akun');
    }
}