<?php

namespace App\Controllers;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use CodeIgniter\I18n\Time;


class PeminjamanBuku extends BaseController
{
    public function List()
    {
        $dataPeminjaman = model('Peminjaman')
            ->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota')
            ->join('Buku', 'Peminjaman.id_buku = Buku.id_buku')
            ->join('Rak', 'Rak.id_rak = Buku.id_rak')
            ->orderBy('id_peminjaman')
            ->find();

        return view('PeminjamanBukuView',[
            'data' => $dataPeminjaman
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
        $dataPeminjaman = model('Peminjaman')
            ->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota')
            ->join('Buku', 'Peminjaman.id_buku = Buku.id_buku')
            ->join('Rak', 'Rak.id_rak = Buku.id_rak')
            ->where('id_peminjaman', $id)
            ->first();
        
        $dateNow = new Time('now', 'Asia/Jakarta');
        $dateKembalian = Time::parse($dataPeminjaman->tanggal_kembali, 'Asia/Jakarta');
        $day = $dateKembalian->difference($dateNow)->getDays();
        $totalHariTerlambat = max($day, 0);
        $totalDenda = $totalHariTerlambat * 2000;
        $totalBayar = $totalDenda + $dataPeminjaman->harga_per_hari;

        return view('PengembalianView', [
            'dataPeminjaman' => $dataPeminjaman,
            'totalHariTerlambat' => $totalHariTerlambat,
            'totalDenda' => $totalDenda,
            'totalBayar' => $totalBayar,
        ]);
    }

    public function DoKembalikanBuku() {
        $data = $this->request->getVar();
        $pengembalian = model('Pengembalian');
        $pengembalian->insert([
            'id_peminjaman' => $data['id_pinjaman'],
            'tanggal_pengembalian' => $data['tanggal_kembali'],
            'total_pembayaran' => $data['total_bayar'],
            'denda' => $data['total_denda'],
        ]);

        return redirect()->to(base_url('PeminjamanBuku/List'));
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
            'id_petugas' => session()->dataUser->id_petugas,
        ]);

        return redirect()->to(base_url('PeminjamanBuku/List'));
    }

    private function getDiffDate($date1, $date2){
        $date1 = date('Y-m-d');
        $hasil = (strtotime($date2) - strtotime($date1))/(60*60*24);
        return $hasil;
    }
}
