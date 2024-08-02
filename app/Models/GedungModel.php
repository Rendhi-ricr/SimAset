<?php

namespace App\Models;

use CodeIgniter\Model;

class GedungModel extends Model
{
    protected $table = 't_gedung';
    protected $primaryKey = 'kode_gedung';
    protected $allowedFields = ['kode_gedung', 'nama_gedung', 'klasifikasi', 'keterangan'];

    public function getGedungByKlasifikasi($klasifikasi)
    {
        return $this->where('klasifikasi', $klasifikasi)->findAll();
    }

    public function generateKodeGedung($klasifikasi)
    {
        // Validasi klasifikasi
        $klasifikasi = strtoupper($klasifikasi);
        $validKlasifikasi = ['REK', 'FIA', 'FSK', 'FIH', 'FAP', 'FKM', 'FKI', 'GBL', 'PSC']; // Tambahkan klasifikasi lain jika diperlukan

        if (!in_array($klasifikasi, $validKlasifikasi)) {
            throw new \InvalidArgumentException('Klasifikasi tidak valid');
        }

        $builder = $this->db->table($this->table);
        $builder->select('kode_gedung');
        $builder->where('kode_gedung LIKE', $klasifikasi . '%');
        $builder->orderBy('kode_gedung', 'DESC');
        $query = $builder->get();

        $result = $query->getRow();
        $lastKode = $result ? $result->kode_gedung : $klasifikasi . '000';

        // Ekstrak bagian numerik dari kode terakhir setelah huruf
        $numericPart = substr($lastKode, strlen($klasifikasi));
        $lastNumber = is_numeric($numericPart) ? (int)$numericPart : 0;

        // Pecah bagian numerik menjadi digit
        $numberStr = sprintf('%03d', $lastNumber);

        // Temukan posisi digit pertama yang tidak nol untuk menambah
        $leadingDigit = intval(substr($numberStr, 0, 1));

        // Generate nomor berikutnya dengan menambahkan 1 pada digit pertama
        $newLeadingDigit = $leadingDigit + 1;
        $nextNumberStr = sprintf('%01d%s', $newLeadingDigit, substr($numberStr, 1));

        // Generate kode berikutnya dengan awalan klasifikasi
        $nextKode = $klasifikasi . $nextNumberStr;

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
