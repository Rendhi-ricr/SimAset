<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 't_barang';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = ['kode_barang', 'nama_barang', 'merk', 'jumlah', 'keterangan'];

    public function generateKodeBarang($klasifikasi)
    {
        // Validasi klasifikasi
        $klasifikasi = strtoupper($klasifikasi);
        $validKlasifikasi = ['ABC', 'DEF']; // Tambahkan klasifikasi lain jika diperlukan

        if (!in_array($klasifikasi, $validKlasifikasi)) {
            throw new \InvalidArgumentException('Klasifikasi tidak valid');
        }

        $builder = $this->db->table($this->table);
        $builder->select('kode_barang');
        $builder->where('kode_barang LIKE', $klasifikasi . '%');
        $builder->orderBy('kode_barang', 'DESC');
        $query = $builder->get();

        $result = $query->getRow();
        $lastKode = $result ? $result->kode_barang : $klasifikasi . '00000';

        // Ekstrak bagian numerik dari kode terakhir
        $lastNumber = substr($lastKode, 3);

        // Generate kode berikutnya dengan awalan klasifikasi
        $nextNumber = str_pad((int)$lastNumber + 1, 5, '0', STR_PAD_LEFT);
        $nextKode = $klasifikasi . $nextNumber;

        return $nextKode;
    }

    // function getAll()
    // {
    //     $builder = $this->db->table('t_barang');
    //     $builder->join('t_kategori', 't_kategori.kode_kategori = t_barang.kode_kategori');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function data_barang($kode_barang)
    {
        return $this->find($kode_barang);
    }
    // public function update_data($data, $id_buku)
    // {
    //     $query = $this->db->table($this->table)->update(
    //         $data,
    //         array('id_buku' => $id_buku)
    //     );
    //     return $query;
    // }
    // public function delete_data($id_buku)
    // {
    //     $query = $this->db->table($this->table)->delete(array('id_buku' => $id_buku));
    //     return $query;
    // }
}
