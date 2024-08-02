<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\RuangModel;
use App\Models\GedungModel;

class Ruang extends BaseController
{
    protected $ruangModel, $gedungModel;

    public function __construct()
    {
        $this->ruangModel = new RuangModel();
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data['ruang'] = $this->ruangModel->getAll();
        return view("admin/ruang/index", $data);
    }

    public function tambah()
    {
        $klasifikasi = $this->request->getGet('klasifikasi'); // Mengambil klasifikasi dari parameter GET

        // Mengambil data gedung berdasarkan klasifikasi jika tersedia
        $gedungByKlasifikasi = [];
        if ($klasifikasi) {
            $gedungByKlasifikasi = $this->gedungModel->where('klasifikasi', $klasifikasi)->findAll();
        }

        $data = [
            'gedung' => $this->gedungModel->findAll(),
            'selectedKlasifikasi' => $klasifikasi,
            'gedungByKlasifikasi' => $gedungByKlasifikasi
        ];

        if ($this->request->getMethod() === 'post') {
            $RuangModel = new RuangModel();
            $kodeRuang = $RuangModel->generateKodeRuang($klasifikasi);
            $kode_gedung = $this->request->getPost('kode_gedung');
            $storeData = [
                'kode_ruang'   => $kodeRuang,
                'kode_gedung'   => $kode_gedung,
                'nama_ruangan'   => $this->request->getPost('nama_ruangan'),
                'keterangan'   => $this->request->getPost('keterangan'),
                'lantai'   => $this->request->getPost('lantai'),
            ];
            $RuangModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Data Ruangan berhasil disimpan');
            return redirect()->to('/admin/ruang');
        }

        return view('admin/ruang/tambah', $data);
    }
}
