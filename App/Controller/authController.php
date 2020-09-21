<?php

namespace App\Controller;
use App\user;
use Exception;

class authController {

    // Method yang digunakan untuk meload view

    public function view($viewName, $data)
    {
        // Mengambil file yang ada didalam folder views
        include 'views/' . $viewName . '.php';
    }

    /**
     * Untuk mendeteksi login
     */

    public function login()
    {
        // Dapatkan jenis http method saat ini
        $Http = $_SERVER['REQUEST_METHOD'];

        // Jika http method saat ini tidak sama dengan
        // post maka buat pesan error
        if($Http != "POST") {
            throw new Exception("Metode " . $Http . ' tidak diizinkan', 500);
        }

        // Cari user berdasarkan username
        $user = user::where('username', $_REQUEST['username']) -> first();

        // Jika hasil ditemukan, maka lakukan validasi password
        if($user && password_verify($_REQUEST['password'],$user->password)) {
            // Jika hasil benar maka user boleh masuk
            // tambahkan parameter id user pada session untuk 
            // menandakan user sudah login
            $_SESSION['id_user'] = $user->id;

            // Digunakan untuk mengarahkan ke halaman
            // index tweet
            header('Location:' . ProjectURL . '/tweet');
        } else {
            // Jika password salah maka 
            // tampilkan pesan error
            echo "Password salah atau user tidak ditemukan!";
        }
    }

    /**
     * Untuk menyimpan data register
     */

    public function register()
    {
        // Dapatkan jenis http method saat ini
        $Http = $_SERVER['REQUEST_METHOD'];

        // Jika http method saat ini tidak sama dengan
        // post maka buat pesan error
        if($Http != "POST") {
            throw new Exception("Metode " . $Http . ' tidak diizinkan', 500);
        }

        // Buat data baru
        $user  = new user();

        // Tangkap data username
        $user->username = $_REQUEST['username'];

        // Tangkap data password dan enkripsi 
        // terlebih dahulu agar lebih aman
        $user->password = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);

        // Simpan data
        $user->save();

        // Alihkan ke halaman login
        header('Location:' . ProjectURL . '/masuk');
    }

    /**
     * Method yang digunakan untuk logout
     */

    public function logout()
    {
        // Hilangkan id_user dengan bantuan 
        // unset
        unset($_SESSION['id_user']);

        // alihkan ke halaman login
        header('Location:' . ProjectURL . '/masuk');
    }

}