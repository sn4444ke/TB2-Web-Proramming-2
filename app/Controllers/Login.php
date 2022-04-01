<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {   
        return view('LoginView');
    }
    
    public function save()
    {
        $petugas = model("User");
        $data = $this->request->getVar();
        
        $user = $petugas->where('username_petugas', $data['user'])->where('password_petugas', $data['password'])->first();
        
        if ($user) {
            session()->set([
                'islogin' => true,
                'dataUser' => $user,
            ]);
            return redirect()->to(base_url('dashboard'));
        } else {
            session()->setFlashdata('item', 'value');
            return redirect()->to(base_url('login'));
        }
    }
}
