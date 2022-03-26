<?php

namespace App\Controllers;

class PeminjamanBuku extends BaseController
{
    public function List()
    {
        return view('PeminjamanBukuView');
    }

    public function Pinjam()
    {
        return view('TableView');
    }

    public function Kembali()
    {
        return view('TableView');
    }
}
