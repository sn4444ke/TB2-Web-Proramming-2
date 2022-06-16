<?php

namespace App\Models;

use CodeIgniter\Model;

class mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $returnType = "object";

    protected $allowedFields = [

        'nama',
        'tentang_saya',
        'alamat',
        'pendidikan',
        'keahlian',
        'hobi',


    ];

    // Validation
    protected $validationRules = [
        'nama' => 'required',
        'tentang_saya' => 'required',
        'alamat' => 'required',
        'pendidikan' => 'required',
        'keahlian' => 'required',
        'hobi' => 'required',

    ];

    public function getAll()
    {
        $builder = $this->db->table('mahasiswa');
        $query = $builder->get();
        return $query->getResult();
    }
}
