<?php

namespace App\Controllers;

class User extends BaseController
{
    public function List()
    {
        // return view('UserView');
        $user = model("App\Models\User");
        
        return view('UserView', [
            'data' => $user->findAll()
        ]);
    }

    public function Search()
    {
        $user = model("App\Models\User");
        $user = $user->where('username_petugas', $_GET['search'])->find();
        
        return view('UserView', [
            'data' => $user
        ]);

        return $_POST['search'];
    }

    public function Tambah()
    {
        return view('FormView');
    }

}
