<?php

namespace App\Controllers;

class User extends BaseController
{
    public function List()
    {
        return view('UserView');
    }

    public function Tambah()
    {
        return view('FormView');
    }
}
