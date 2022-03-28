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

        return redirect()->to(base_url('User/List'));
    }

    public function HapusUser($id)
    {
        $user = model("User");
        $user->where('id_petugas', $id)->delete();

        return redirect()->to(base_url('User/List'));
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

        return redirect()->to(base_url('User/List'));
    }

}
