<?php

namespace App\Controllers;

class PeminjamanBuku extends BaseController
{
    public function List()
    {
        $data = model('Peminjaman')

        return view('PeminjamanBukuView',[
            'data' => $data
        ]);
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
