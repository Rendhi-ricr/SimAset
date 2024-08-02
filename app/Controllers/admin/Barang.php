<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KategoriModel;

class Barang extends BaseController
{
    protected $barangModel, $kategoriModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
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

            $barangModel = new BarangModel();
            $klasifikasi = $this->request->getPost('klasifikasi') ?? 'ABC';
            $kodeBarang = $barangModel->generateKodeBarang($klasifikasi);
            // $kode_kategori = $this->request->getVar('kode_kategori');
            $storeData = [
                'kode_barang'   => $kodeBarang,
                'nama_barang'   => $this->request->getPost('nama_barang'),
                'merk'   => $this->request->getPost('merk'),
                'jumlah'   => $this->request->getPost('jumlah'),
                'keterangan'   => $this->request->getPost('keterangan'),

            ];
            $barangModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/admin/barang');
        }
        return view('admin/barang/tambah', $data);
    }
}
