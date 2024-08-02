<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 't_kategori';
    protected $primaryKey = 'kode_kategori';
    protected $allowedFields = ['kode_kategori', 'nama_kategori'];


    // function getAll()
    // {
    //     $builder = $this->db->table('tbl_buku');
    //     $builder->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
    //         ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function data_kategori($kode_kategori)
    {
        return $this->find($kode_kategori);
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
