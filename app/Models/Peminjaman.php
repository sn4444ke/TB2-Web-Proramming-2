<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $returnType = "object";

    protected $allowedFields = [
        'kode_peminjaman',
        'tanggal_pinjam',
        'tanggal_kembali',
        'id_buku',
        'id_anggota',
        'id_petugas'
    ];

    public function getAll(){
        $builder = $this->db->table('Peminjaman');
        $builder->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota');
        $builder->join('Buku', 'Peminjaman.id_buku = Buku.id_buku');
        $builder->join('Rak', 'Rak.id_rak = Buku.id_rak');
        $builder->orderBy('id_peminjaman');
        $query = $builder->get();

        return $query->getResult();
    }
}