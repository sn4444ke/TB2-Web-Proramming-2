<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengembalian extends Model
{
    protected $table      = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $returnType = "object";

    protected $allowedFields = [
        'id_pengembalian',
        'id_peminjaman',
        'tanggal_pengembalian',
        'total_pembayaran',
        'denda',
    ];
}