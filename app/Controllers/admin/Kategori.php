<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view("admin/kategori/index", $data);
    }

    public function tambah()
    {
        $data = [];
        if ($this->request->getMethod() === 'post') {

            $kategoriModel = new KategoriModel();
            $storeData = [
                'kode_kategori'   => $this->request->getPost('kode_kategori'),
                'nama_kategori'   => $this->request->getPost('nama_kategori'),

            ];
            $kategoriModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/admin/kategori');
        }
        return view('admin/kategori/tambah', $data);
    }
}
