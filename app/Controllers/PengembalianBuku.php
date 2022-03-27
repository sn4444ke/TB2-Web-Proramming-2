<?php

namespace App\Controllers;

class PengembalianBuku extends BaseController
{
    public function List()
    {
        return view('PengembalianBukuView');
    }

    public function Kembali()
    {
        return view('FormView');
    }
}
