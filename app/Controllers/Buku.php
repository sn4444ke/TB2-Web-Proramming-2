<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function List()
    {
        return view('BukuView');
    }

    public function Tambah()
    {
        return view('FormView');
    }
}
