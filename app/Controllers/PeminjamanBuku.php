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
        return view('FormView');
    }

    public function Kembali()
    {
        return view('FormView');
    }
}
