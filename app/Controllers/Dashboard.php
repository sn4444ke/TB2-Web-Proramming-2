<?php

namespace App\Controllers;

class Dashboard extends BaseController
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
        return view('DashboardView');
    }

    public function table()
    {
        return view('TableView');
    }

    public function login()
    {
        return view('LoginView');
    }

    public function newHome()
    {
        return view('NewDashboardView');
    }
}
