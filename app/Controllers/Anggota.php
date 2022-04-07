<?php

namespace App\Controllers;

// deklarasi class Anggota memiliki sifat keturuan dari BaseController
class Anggota extends BaseController
{
    
    // deklarasi method index(), berfungsi sebagai method index
    public function index()
    {
        // deklarasi variable anggota, untuk memanggil model Anggota
        $anggota = model("Anggota");

        // return halaman AnggotaView dengan variable data berisi hasil dari pemanggilan method findAll() dari model Anggota
        return view('AnggotaView', [
            'data' => $anggota->findAll()
        ]);
    }

    // deklarasi method Search() untuk mencari data Anggota berdasarkan kode_anggota petugas
    public function Search()
    {
        // deklarasi variable user, untuk memanggil model Anggota
        $anggota = model("Anggota");
        // deklaraasi kondisi jika parameter get index search ada dan tidak sama dengan string kosong, 
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            // maka query akan ditambah dengan where kode_anggota sama dengan variable get index search
            $anggota = $anggota->where('kode_anggota', $this->request->getVar('search'));
        }
        // memanggil fungsi find() yang artinya hasil dari query memungkinkan ada banyak data
        $anggota = $anggota->find();

        // return halaman AnggotaView dengan variable data berisi anggota dengan kode_anggota sama dengan variable get index search 
        return view('AnggotaView', [
            'data' => $anggota
        ]);
    }

    // deklarasi method Tambah(), method ini akan berfungsi untuk menambah data Anggota
    public function Tambah()
    {
        // return halaman TambahAnggota dengan data action berisi link url / tujuan kemana form TambahAnggota akan di kirim. 
        // '/Anggota/DoTambahAnggota' artinya form akan disubmit ke controller Anggota dan fungsi DoTambahAnggota() yang akan dijelaskan setelah fungsi ini (Tambah())
        
        return view('TambahAnggota', [
            'action' => base_url().'/Anggota/DoTambahAnggota'
        ]);
    }

    // deklarasi method DoTambahAnggota(), berfungsi sebagai action yang akan kita lakukan pada saat mensubmit form tambah anggota
    public function DoTambahAnggota()
    {

        // variable data berisikan parameter-parameter yang ada di form anggota yang terkirim ke method ini
        $data = $this->request->getPost();
        
        // deklarasi variable anggota, untuk memanggil model Anggota
        $anggota = model("Anggota");

        // kondisi jika id_anggota blm ada di dalam database, maka program akan insert, jika sudah tidak akan insert apapun
        if(!$anggota->where('id_anggota', $this->request->getVar('id_anggota'))->find()) {
            $anggota->insert($data);
        }

        // saat semua proses selesai, redirect ke menu list anggota
        return redirect()->to(base_url('Anggota'));
    }

    // deklarasi method HapusAnggota(), berfungsi untuk menghapus anggota berdasarkan id anggota
    public function HapusAnggota($id)
    {
        // seperti biasa kita panggil model anggota disini, dan di deklarasikan sebagai variable anggota
        $anggota = model("Anggota");
        // cari Anggota dengan id_anggota sama dengan variable id, dan langsung menghapusnya jika menemukan data
        $anggota->where('id_anggota', $id)->delete();

        // saat semua proses selesai, redirect ke menu list Anggota
        return redirect()->to(base_url('Anggota'));
    }

    // deklarasi method EditAnggota(), berfungsi untuk menampilkan halaman form edit anggota berserta data2 anggota yang dipilih untuk diedit
    public function EditAnggota($id)
    {
        // seperti biasa kita panggil model Anggota disini, dan di deklarasikan sebagai variable anggota
        $anggota = model("Anggota");
        // cari Anggota dengan id_anggota sama dengan variable id, yang nantinya akan ditampilkan pada view EditAnggota
        $anggota = $anggota->where('id_anggota', $id)->first();

        // tampilkan halaman / view TambahAnggota dengan data $anggota yang dipilih, dan data action berisi url kemana form TambahAnggota akan dikirim
        // jika diperhatikan kita sengaja menggunakan view TambahAnggota sebagai edit dan add sekaligus agar hemat resource, yang jadi pembeda adalah actionnya kemana data form tersebut akan dikirim yaitu pada data action
        return view('TambahAnggota', [
            'dataAnggota' => $anggota,
            // 'dataRak' => $dataRak->findAll(),
            'action' => base_url().'/Anggota/DoEdit/'.$id
        ]);
    }

    // deklarasi method DoEdit(), berfungsi sebagai action yang akan kita lakukan pada saat mensubmit form edit anggota dikirim
    public function DoEdit($id)
    {
        // variable data berisikan parameter-parameter yang ada di form anggota yang terkirim ke method ini
        $data = $this->request->getPost();
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable Anggota
        $anggota = model("Anggota");
        // cari anggota dengan id_anggota sama dengan variable id, dan langsung menghapusnya jika menemukan data
        $anggota = $anggota->where('id_anggota', $id);
        // update data yang ditemukan dengan parameter form 
        $anggota->update($id, $data);

        // saat semua proses selesai, redirect ke menu list anggota
        return redirect()->to(base_url('Anggota'));
    }

}
