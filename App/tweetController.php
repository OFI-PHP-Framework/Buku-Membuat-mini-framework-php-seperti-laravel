<?php 

namespace App;

// Import class tweet
// sebagai model tabel tweet
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
    }
}