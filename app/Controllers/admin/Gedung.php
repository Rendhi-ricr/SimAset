<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\GedungModel;


class Barang extends BaseController
{
    protected $gedungModel;
    public function __construct()
    {
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view("admin/barang/index", $data);
    }

    public function tambah()
    {
        $data = [];
        if ($this->request->getMethod() === 'post') {

            $gedungModel = new GedungModel();
            $klasifikasi = $this->request->getPost('klasifikasi') ?? 'ABC';
            $kodeBarang = $gedungModel->generateKodeBarang($klasifikasi);
            $storeData = [
                'kode_barang'   => $kodeBarang,
                'nama_barang'   => $this->request->getPost('nama_barang'),
                'merk'   => $this->request->getPost('merk'),
                'jumlah'   => $this->request->getPost('jumlah'),
                'keterangan'   => $this->request->getPost('keterangan'),

            ];
            $gedungModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/admin/barang');
        }
        return view('admin/barang/tambah', $data);
    }
}
