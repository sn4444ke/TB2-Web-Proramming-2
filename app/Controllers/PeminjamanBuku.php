<?php

namespace App\Controllers;

class PeminjamanBuku extends BaseController
{
    public function List()
    {
        return view('PeminjamanBukuView',[
            'data' => model('Peminjaman')->getAll()
        ]);
    }

    public function Pinjam()
    {
        return view('TambahPeminjamanView', [
            'dataBuku' => model('Buku')->findAll(),
            'dataAnggota' => model('Anggota')->findAll(),
        ]);
    }

    public function KembalikanBuku($id)
    {
        return view('PengembalianView', [
            'dataPeminjaman' => model('Peminjaman')->getAll()
        ]);
    }

    
    public function DoPinjam()
    {
        $Peminjaman = model("Peminjaman");
        $Peminjaman->insert([
            'kode_peminjaman' => 'PJM-'.date('Ymd').'-'.rand(1,999),
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
            'id_buku' => $this->request->getVar('id_buku'),
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_petugas' => 1
        ]);

        return redirect()->to(base_url('PeminjamanBuku/List'));
    }
}
