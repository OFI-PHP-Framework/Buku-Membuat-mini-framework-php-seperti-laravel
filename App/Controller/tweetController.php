<?php 

namespace App\Controller;

// Import class tweet
// sebagai model tabel tweet

use App\Middleware\cekLogin;
use App\tweet;
use Exception;

class tweetController {

    // Method yang digunakan untuk meload view

    public function view($viewName, $data)
    {
        // Mengambil file yang ada didalam folder views
        include 'views/' . $viewName . '.php';
    }

    // Method yang digunakan untuk menampilkan
    // semua data tweet

    public function index()
    {
        // Ambil semua data tweet
        $tweet = tweet::all();

        // Cetak semua data tweet
        // echo "<pre>";
        // print_r($tweet);
        // echo "</pre>";

        // Panggil method tweet
        // tweet adalah nama file tweet.phpnya
        // $tweet adalah nama variabel 
        //   yang akan kita panggil
        $this->view('tweet', $tweet);
    }

    /**
     * Digunakan untuk menyimpan data
     */

    public function store()
    {
        $middleware = new cekLogin;
        $middleware->handle();

        // Dapatkan jenis http method saat ini
        $Http = $_SERVER['REQUEST_METHOD'];

        // Jika http method saat ini tidak sama dengan
        // post maka buat pesan error
        if($Http != "POST") {
            throw new Exception("Metode " . $Http . ' tidak diizinkan', 500);
        }

        // Buat data tweet baru
        $data = new tweet();

        // Tangkap data user
        $data->user = $_REQUEST['user'];

        // Tangkap data tweet
        $data->tweet = $_REQUEST['tweet'];

        // Simpan data
        $data->save();

        header('Location:' . ProjectURL . '/tweet');
    }

    /**
     * Digunakan untuk menyimpan perubahan data
     */

    public function update()
    {
        $middleware = new cekLogin;
        $middleware->handle();

        // Dapatkan jenis http method saat ini
        $Http = $_SERVER['REQUEST_METHOD'];

        // Jika http method saat ini tidak sama dengan
        // post maka buat pesan error
        if($Http != "POST") {
            throw new Exception("Metode " . $Http . ' tidak diizinkan', 500);
        }

        // Edit data tweet baru
        $data = tweet::where('id', $_GET['id']) -> first();

        // Tangkap data user
        $data->user = $_REQUEST['user'];

        // Tangkap data tweet
        $data->tweet = $_REQUEST['tweet'];

        // Simpan data
        $data->update();

        header('Location:' . ProjectURL . '/tweet');
    }

    /**
     * Digunakan untuk memuat 
     * template editnya dan sambil
     * membawa data yang akan kita edit
     */

    public function edit()
    {
        $middleware = new cekLogin;
        $middleware->handle();

        // Mendapatkan id dari parameter
        $id = $_GET['id'];

        // Mendapatkan data tweet dari database
        $tweet = tweet::where('id', $id) -> first();

        // Jika tidak terdapat id pada parameter 
        // atau tidak ditemukannya data dalam database
        // maka alihkan ke halaman index tweet
        if(!$id || !$tweet) {
            header('Location: ' . ProjectURL . '/tweet');
        }

        // Jika data ditemukan maka muat view edit
        // sambil membawa data tweet
        $this->view('edit', $tweet);
    }

    /**
     * Method yang digunakan untuk menghapus data
     * tweet
     */
    public function delete()
    {
        $middleware = new cekLogin;
        $middleware->handle();

        // Mendapatkan id dari parameter
        $id = $_GET['id'];

        // Proses hapus datanya
        tweet::where('id', $id) -> first() -> delete();

        // Alihkan ke halaman index tweet ketika sudah 
        // selesai hapus data
        header('Location:' . ProjectURL . '/tweet');
    }
}