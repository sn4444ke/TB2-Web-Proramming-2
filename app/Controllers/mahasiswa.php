<?php

namespace App\Controllers;

class mahasiswa extends BaseController
{


    public function index()
    {

        $mahasiswa = model("Mahasiswa");


        return view('mahasiswa', [
            'data' => $mahasiswa->findAll()
        ]);
    }




    public function Tambah()
    {



        return view('Tambahmahasiswa', [
            'action' => base_url() . '/mahasiswa/DoTambahmahasiswa'
        ]);
    }


    public function DoTambahmahasiswa()
    {


        $data = $this->request->getPost();


        $mahasiswa = model("mahasiswa");


        if (!$mahasiswa->where('id', $this->request->getVar('id'))->find()) {
            $mahasiswa->insert($data);
        }


        return redirect()->to(base_url('mahasiswa'));
    }


    public function Hapusmahasiswa($id)
    {

        $mahasiswa = model("mahasiswa");

        $mahasiswa->where('id', $id)->delete();


        return redirect()->to(base_url('mahasiswa'));
    }


    public function Editmahasiswa($id)
    {

        $mahasiswa = model("mahasiswa");

        $mahasiswa = $mahasiswa->where('id', $id)->first();



        return view('Tambahmahasiswa', [
            'datamahasiswa' => $mahasiswa,

            'action' => base_url() . '/mahasiswa/DoEditmahasiswa/' . $id
        ]);
    }


    public function DoEditmahasiswa($id)
    {

        $data = $this->request->getPost();

        $mahasiswa = model("mahasiswa");

        $mahasiswa = $mahasiswa->where('id', $id);

        $mahasiswa->update($id, $data);


        return redirect()->to(base_url('mahasiswa'));
    }
}
