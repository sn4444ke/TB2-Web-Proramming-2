<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function List()
    {
        $buku = model("App\Models\Buku");
        
        return view('BukuView', [
            'data' => $buku->findAll()
        ]);
    }

    public function Tambah()
    {
        return view('TambahBuku');
    }

    public function Search()
    {
        $buku = model("App\Models\Buku");
        $buku = $buku->where('kode_buku', $_GET['search'])->find();
        
        return view('BukuView', [
            'data' => $buku
        ]);

        return $_POST['search'];
    }
}
