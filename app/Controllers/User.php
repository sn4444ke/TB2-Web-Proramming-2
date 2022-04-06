<?php

namespace App\Controllers;

// deklarasi class User memiliki sifat keturuan dari BaseController
class User extends BaseController
{
    // deklarasi method index(), berfungsi sebagai method index
    public function index()
    {
        // deklarasi variable user, untuk memanggil model user
        $user = model("User");
        
        // return halaman UserView dengan variable data berisi hasil dari pemanggilan method findAll() dari model user
        return view('UserView', [
            'data' => $user->findAll()
        ]);
    }

    // deklarasi method Search() untuk mencari data User berdasarkan username petugas
    public function Search()
    {
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable user
        $user = model("User");
        // deklaraasi kondisi jika parameter get index search ada dan tidak sama dengan string kosong, 
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            // maka query akan ditambah dengan where username_petugas sama dengan variable get index search
            $user = $user->where('username_petugas', $this->request->getVar('search'));
        }
        // memanggil fungsi find() yang artinya hasil dari query memungkinkan ada banyak data
        $user = $user->find();
        
        // return halaman UserView dengan variable data berisi user dengan kategori username_petugas sama dengan variable get index search 
        return view('UserView', [
            'data' => $user
        ]);
    }

    // deklarasi method Tambah(), method ini akan berfungsi untuk menambah data buku
    public function Tambah()
    {
        // return halaman TambahUser dengan data action berisi link url / tujuan kemana form TambahUser akan di kirim. 
        // '/User/DoTambahUser' artinya form akan disubmit ke controller User dan fungsi DoTambahUser() yang akan dijelaskan setelah fungsi ini (Tambah())
        return view('TambahUser', [
            'action' => base_url().'/User/DoTambahUser'
        ]);
    }

    // deklarasi method DoTambahUser(), berfungsi sebagai action yang akan kita lakukan pada saat mensubmit form tambah user
    public function DoTambahUser()
    {
        // variable data berisikan parameter-parameter yang ada di form user yang terkirim ke method ini
        $data = $this->request->getPost();
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable user
        $user = model("User");

        // kondisi jika username_petugas blm ada di dalam database, maka program akan insert, jika sudah tidak akan insert apapun
        if(!$user->where('username_petugas', $this->request->getVar('username_petugas'))->find()) {
            $user->insert($data);
        }

        // saat semua proses selesai, redirect ke menu list user
        return redirect()->to(base_url('User'));
    }

    // deklarasi method HapusUser(), berfungsi untuk menghapus user berdasarkan id petugas
    public function HapusUser($id)
    {
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable user
        $user = model("User");
        // cari User dengan id_petugas sama dengan variable id, dan langsung menghapusnya jika menemukan data
        $user->where('id_petugas', $id)->delete();
        // saat semua proses selesai, redirect ke menu list user
        return redirect()->to(base_url('User'));
    }

    // deklarasi method EditUser(), berfungsi untuk menampilkan halaman form edit user berserta data2 user yang dipilih untuk diedit
    public function EditUser($id)
    {
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable user
        $user = model("User");
        // cari User dengan id_petugas sama dengan variable id, yang nantinya akan ditampilkan pada view TambahUser
        $user = $user->where('id_petugas', $id)->first();

        // tampilkan halaman / view TambahUser dengan data $user yang dipilih, dan data action berisi url kemana form TambahUser akan dikirim
        // jika diperhatikan kita sengaja menggunakan view TambahUser sebagai edit dan add sekaligus agar hemat resource, yang jadi pembeda adalah actionnya kemana data form tersebut akan dikirim yaitu pada data action
        return view('TambahUser', [
            'dataUser' => $user,
            'action' => base_url().'/User/DoEdit/'.$id
        ]);
    }

    // deklarasi method DoTambahUser(), berfungsi sebagai action yang akan kita lakukan pada saat mensubmit form edit user dikirim
    public function DoEdit($id)
    {
        // variable data berisikan parameter-parameter yang ada di form user yang terkirim ke method ini
        $data = $this->request->getPost();
        // seperti biasa kita panggil model user disini, dan di deklarasikan sebagai variable user
        $user = model("User");
        // cari User dengan id_petugas sama dengan variable id, dan langsung menghapusnya jika menemukan data
        $user = $user->where('id_petugas', $id);
        // update data yang ditemukan dengan parameter form 
        $user->update($id, $data);
        // saat semua proses selesai, redirect ke menu list user
        return redirect()->to(base_url('User'));
    }

}
