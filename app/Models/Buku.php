<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
    protected $table      = 'buku';
    protected $returnType = \App\Entities\DataBuku::class;

    protected $allowedFields = [
        'kode_buku',
        'judul_buku',
        'penulis_buku',
        'penerbit_buku',
        'tahun_penerbit',
        'rak',
        'stok'
    ];

    // Validation
    protected $validationRules = [
        'kode_buku' => "required",
        'judul_buku' => "required",
        'penulis_buku' => "required",
        'penerbit_buku' => "required",
        'tahun_penerbit' => "required",
        'stok' => "required"
    ];
}