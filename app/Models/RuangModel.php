<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
    protected $table = 't_ruang';
    protected $primaryKey = 'kode_ruang';
    protected $allowedFields = ['kode_ruang', 'kode_gedung', 'nama_ruangan', 'keterangan', 'lantai'];

    public function generateKodeRuang($klasifikasi)
    {
        // Validasi klasifikasi
        $klasifikasi = strtoupper($klasifikasi);
        $validKlasifikasi = ['REK', 'FIA', 'FSK', 'FIH', 'FAP', 'FKM', 'FKI', 'GBL', 'PSC']; // Tambahkan klasifikasi lain jika diperlukan

        if (!in_array($klasifikasi, $validKlasifikasi)) {
            throw new \InvalidArgumentException('Klasifikasi tidak valid');
        }

        $builder = $this->db->table($this->table);
        $builder->select('kode_ruang');
        $builder->where('kode_ruang LIKE', $klasifikasi . '%');
        $builder->orderBy('kode_ruang', 'DESC');
        $query = $builder->get();

        $result = $query->getRow();
        $lastKode = $result ? $result->kode_ruang : $klasifikasi . '000';

        // Ekstrak bagian numerik dari kode terakhir
        $lastNumber = substr($lastKode, 3);

        // Generate kode berikutnya dengan awalan klasifikasi
        $nextNumber = str_pad((int)$lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $nextKode = $klasifikasi . $nextNumber;

        return $nextKode;
    }

    function getAll()
    {
        $builder = $this->db->table('t_ruang');
        $builder->join('t_gedung', 't_gedung.kode_gedung = t_ruang.kode_ruang');
        $query = $builder->get();
        return $query->getResult();
    }

    // public function data_barang($kode_barang)
    // {
    //     return $this->find($kode_barang);
    // }
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
