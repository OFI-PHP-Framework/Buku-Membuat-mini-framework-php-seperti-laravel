<?php 

namespace App;

/**
 * Middleware cek login
 * digunakan untuk pembatasan akses
 * untuk user yang belum login
 */

//  Import class user
use App\user;
use Exception;

class cekLogin {

    public function handle()
    {
        // Jika id_user pada session ditemukan 
        if(isset($_SESSION['id_user'])) {
            // cek user yang sedang login 
            // dengan yang di database
            $user = user::where('id', $_SESSION['id_user']) -> first();

            // Jika hasil dari $user tidak ditemukan
            // maka alihkan ke halaman login

            if(!$user) {
                header('Location:' . ProjectURL . '/masuk');
                die();
            }
        } else {
            // Jika id_user pada session tidak ditemukan
            // maka alihkan ke halaman login
            header('Location:' . ProjectURL . '/masuk');
            die();
        }
    }
}