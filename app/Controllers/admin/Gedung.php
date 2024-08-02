<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\GedungModel;


class Gedung extends BaseController
{
    protected $gedungModel;
    public function __construct()
    {
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data['gedung'] = $this->gedungModel->findAll();
        return view("admin/gedung/index", $data);
    }

    public function tambah()
    {
        $data = [];
        if ($this->request->getMethod() === 'post') {

            $gedungModel = new GedungModel();
            $klasifikasi = $this->request->getPost('klasifikasi');
            $kodeGedung = $gedungModel->generateKodeGedung($klasifikasi);
            $storeData = [
                'kode_gedung'   => $kodeGedung,
                'nama_gedung'   => $this->request->getPost('nama_gedung'),
                'klasifikasi'   => $this->request->getPost('klasifikasi'),
                'keterangan'   => $this->request->getPost('keterangan'),

            ];
            $gedungModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/admin/gedung');
        }
        return view('admin/gedung/tambah', $data);
    }
}
