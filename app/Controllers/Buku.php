<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function List()
    {
        $buku = model("Buku");
        
        return view('BukuView', [
            'data' => $buku->findAll()
        ]);
    }

    public function Search()
    {
        $buku = model("Buku");
        $buku = $buku->where('kode_buku', $_GET['search'])->find();
        
        return view('BukuView', [
            'data' => $buku
        ]);
    }

    public function Tambah()
    {
        $dataRak = model("Rak");

        return view('TambahBuku', [
            'dataRak' => $dataRak->findAll()
        ]);
    }

    public function DoTambahBuku()
    {
        $buku = model("Buku");

        if(!$buku->where('kode_buku', $this->request->getVar('kode_buku'))->find()) {
            $buku->insert([
                'kode_buku'      => $this->request->getVar('kode_buku'),
                'judul_buku'     => $this->request->getVar('judul_buku'),
                'penulis_buku'   => $this->request->getVar('penulis_buku'),
                'penerbit_buku'  => $this->request->getVar('penerbit_buku'),
                'tahun_penerbit' => $this->request->getVar('tahun_penerbit'),
                'id_rak'         => $this->request->getVar('id_rak'),
                'stok'           => $this->request->getVar('stok')
            ]);
        }

        return redirect()->to(base_url('Buku/List'));
    }
}
