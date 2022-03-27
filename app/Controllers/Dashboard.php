<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('DashboardView');
    }

    public function table()
    {
        return view('TableView');
    }

    public function newHome()
    {
        return view('NewDashboardView');
    }
}
