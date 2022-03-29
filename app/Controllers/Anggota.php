<?php

namespace App\Controllers;

class Anggota extends BaseController
{
    public function List()
    {
        // return view('UserView');
        $anggota = model("App\Models\Anggota");
        
        return view('AnggotaView', [
            'data' => $anggota->findAll()
        ]);
    }

    public function Search()
    {
        $anggota = model("App\Models\Anggota");
        $anggota = $anggota->where('kode_anggota', $_GET['search'])->find();
        
        return view('AnggotaView', [
            'data' => $anggota
        ]);

        return $_POST['search'];
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

        return redirect()->to(base_url('Anggota/List'));
    }

    public function HapusAnggota($id)
    {
        $anggota = model("Anggota");
        $anggota->where('id_anggota', $id)->delete();

        return redirect()->to(base_url('Anggota/List'));
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

        return redirect()->to(base_url('Anggota/List'));
    }

}
