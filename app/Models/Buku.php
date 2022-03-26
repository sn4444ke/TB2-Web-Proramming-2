<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
    protected $db; 
    protected $table      = 'buku';
    protected $primaryKey = 'id_buku';
    protected $returnType = 'json';

    protected $allowedFields = [
      'kode_buku',
      'judul_buku',
      'penulis_buku',
      'penerbit_buku',
      'tahun_penerbit',
      'stok'
    ];

    function __construct() {
      $this->db = \Config\Database::connect();
    }

    public function get() {
      $db = \Config\Database::connect();
      $query = $db->query('SELECT * FROM buku LIMIT 1');
      $row   = $query->getRow();

      return $row;
    }
}