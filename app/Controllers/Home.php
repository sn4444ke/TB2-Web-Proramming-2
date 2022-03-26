<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index()
    // {
    //     $buku = model("App\Models\Buku");
    //     foreach ($buku->get() as $key => $value) {
    //         echo $value . '<br>';
    //     }
    // }

    public function index()
    {
        return view('HomeView');
    }
}
