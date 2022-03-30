<?php

namespace App\Controllers;

class Anggota extends BaseController
{
    public function index()
    {
        // return view('UserView');
        $anggota = model("Anggota");
        
        return view('AnggotaView', [
            'data' => $anggota->findAll()
        ]);
    }

    public function Search()
    {
        $anggota = model("Anggota");
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            $anggota = $anggota->where('kode_anggota', $this->request->getVar('search'));
        }
        $anggota = $anggota->find();

        return view('AnggotaView', [
            'data' => $anggota
        ]);
    }

    public function Tambah()
    {
        // $dataRak = model("Rak");

        return view('TambahAnggota', [
            // 'dataRak' => $dataRak->findAll(),
            'action' => base_url().'/Anggota/DoTambahAnggota'
        ]);
    }

    public function DoTambahAnggota()
    {
        $data = $this->request->getPost();
        $anggota = model("Anggota");

        if(!$anggota->where('id_anggota', $this->request->getVar('id_anggota'))->find()) {
            $anggota->insert($data);
        }

        return redirect()->to(base_url('Anggota'));
    }

    public function HapusAnggota($id)
    {
        $anggota = model("Anggota");
        $anggota->where('id_anggota', $id)->delete();

        return redirect()->to(base_url('Anggota'));
    }

    public function EditAnggota($id)
    {
        // $dataRak = model("Rak");
        $anggota = model("Anggota");
        $anggota = $anggota->where('id_anggota', $id)->first();

        return view('TambahAnggota', [
            'dataAnggota' => $anggota,
            // 'dataRak' => $dataRak->findAll(),
            'action' => base_url().'/Anggota/DoEdit/'.$id
        ]);
    }

    public function DoEdit($id)
    {
        $data = $this->request->getPost();
        $anggota = model("Anggota");
        $anggota = $anggota->where('id_anggota', $id);
        $anggota->update($id, $data);

        return redirect()->to(base_url('Anggota'));
    }

}
