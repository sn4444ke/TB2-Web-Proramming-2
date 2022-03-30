<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        // return view('UserView');
        $user = model("User");
        
        return view('UserView', [
            'data' => $user->findAll()
        ]);
    }

    public function Search()
    {
        $user = model("User");
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            $user = $user->where('username_petugas', $this->request->getVar('search'));
        }
        $user = $user->find();
        
        return view('UserView', [
            'data' => $user
        ]);
    }

    public function Tambah()
    {
        $dataRak = model("Rak");

        return view('TambahUser', [
            'dataRak' => $dataRak->findAll(),
            'action' => base_url().'/User/DoTambahUser'
        ]);
    }

    public function DoTambahUser()
    {
        $data = $this->request->getPost();
        $user = model("User");

        if(!$user->where('id_petugas', $this->request->getVar('id_petugas'))->find()) {
            $user->insert($data);
        }

        return redirect()->to(base_url('User'));
    }

    public function HapusUser($id)
    {
        $user = model("User");
        $user->where('id_petugas', $id)->delete();

        return redirect()->to(base_url('User'));
    }

    public function EditUser($id)
    {
        // $dataRak = model("Rak");
        $user = model("User");
        $user = $user->where('id_petugas', $id)->first();

        return view('TambahUser', [
            'dataUser' => $user,
            // 'dataRak' => $dataRak->findAll(),
            'action' => base_url().'/User/DoEdit/'.$id
        ]);
    }

    public function DoEdit($id)
    {
        $data = $this->request->getPost();
        $user = model("User");
        $user = $user->where('id_petugas', $id);
        $user->update($id, $data);

        return redirect()->to(base_url('User'));
    }

}
