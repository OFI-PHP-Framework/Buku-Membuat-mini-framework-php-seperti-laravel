<?php 

/**
 * Namespace merupakan kumpulan entities (class, object, function) 
 * yang dikelompokkan dalam satu nama. 
 */

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;
use Exception;
use Volnix\CSRF\CSRF;
include 'config.php';
session_start();

// untuk mendapatkan token
// berupa input hidden token
define('CSRF', CSRF::getHiddenInputString());


/**
 * Class adalah bisa dikatakan seperti keluarga
 * jadi didalam class core akan ada beberapa anggota keluarga
 */

class core {

    // Berfungsi untuk mendapatkan request saat ini
    // dari url
    protected $getRequest;

    /**
     * Method yang akan berjalan setiap saat ketika
     * method lain dipanggil
     */

    public function __construct()
    {
        // isi fungsi getRequest dengan url saat ini
        // dengan bantuan instance $_SERVER
        $this->getRequest = $_SERVER['REQUEST_URI'];
        $this->databaseEngine();

        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    /**
     * Method untuk mengaktifkan package database
     * laravel kedalam sistem framework kita
     */

    public function databaseEngine()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => server,
            'database'  => database,
            'username'  => username,
            'password'  => password,
            'port'      => port,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }

    /**
     * Method untuk mendapatkan semua 
     * konfigurasi route kita
     */

    public function getRoute()
    {
        include 'routes/web.php';
        return $web;
    }

    /**
     * Method yang berfungsi untuk memproses
     * permintaan dan mencocokan dengan file config
     */

    public function processRoute()
    {
        // Membuat perulangan dengan mengambil data array
        // pada method getRoute()

        $array = $this->getRoute();

        // proses untuk membersihkan hasil dari
        // getRequest, pertama ambil value dari ProjectURL
        // yang ada di file config

        $getURL = str_replace(ProjectURL, '', $this->getRequest);

        // hapus tanda / dengan bantuan ltrim
        $url = ltrim($getURL, '/');

        // Buat variabel penyimpanan sementara
        // untuk menyimpan data route, tipe dan direction
        // ketika ditemukannya kecocokan data 
        // pada proses looping

        $temp_route = null;
        $temp_type = null;
        $temp_direction = null;

        for ($i=0; $i < count($array); $i++) { 

            $route = $array[$i]['url'];

            // Jika url saat ini sama dengan deklarasi 
            // pada route maka
            if(rtrim(strtok($url, '?'), '/') === $route) {
                // masukan data dari array kedalam 3 variabel $temp
                $temp_route     = $route;
                $temp_type      = $array[$i]['type'];
                $temp_direction = $array[$i]['direction'];

                // dan hentikan perulangan dengan paksa
                // jika sudah menemukan kecocokan data
                break;
            } 
        }

        switch ($temp_type) {
            case 'view':
                // Mendapatkan path instalasi projek kita
                // hasilnya seperti ini
                // C:/xampp_7.1/htdocs/myFramework/views/
                $path_view = $_SERVER["DOCUMENT_ROOT"] . ProjectURL . '/views/';

                // Cari apakah file yang diminta ada didalam folder views?
                if(is_file($path_view . $temp_direction . '.php')) {
                    // Buka file yang ada didalam views menggunakan include
                    include $path_view . $temp_direction . '.php';
                } else {
                    // jika file view tidak ditemukan
                    throw new Exception("Views not found", 1);
                }

                break;
            
            case 'controller':
                // Mendapatkan path instalasi projek kita
                // hasilnya seperti ini
                // C:/xampp_7.1/htdocs/myFramework/App/
                $path_controller = $_SERVER["DOCUMENT_ROOT"] . ProjectURL . '/App/Controller/';

                // Kita pecah dulu menjadi dua bagian value pada direction
                $explode = explode('@', $temp_direction);

                // Cari tahu apakah file controller yang dimaksud tersedia atau tidak
                if(is_file($path_controller . $explode[0] . '.php')) {
                    // Hasilnya seperti ini
                    // Array ( [0] => helloController [1] => index )
                    
                    // Dapatkan class dan method pada proses explode diatas
                    $getClass = 'App\\Controller\\' . $explode[0];
                    $getMethods = $explode[1];

                    // Buat class baru dengan memanggil $getClass
                    $newClass = new $getClass;

                    // dan panggil method dengan cara seperti ini
                    $newClass->$getMethods();
                } else {
                    throw new Exception("File yang diminta tidak ada", 400);
                }

                break;

            default:
                throw new Exception("Request 404 not found", 404);
                break;
        }

    }

    /**
     * Method ini adalah method yang akan dipanggil
     * supaya aplikasi kita berjalan
     */

    public function start()
    {
        // Dapatkan info http method
        // apakah Get atau POST
        $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

        // Jika Http method adalah
        // POST maka lakukan validasi token
        // CSRF
        // strtoupper untuk mengubah teks menjadi
        // huruf kapital (besar) semua

        if(strtoupper($REQUEST_METHOD) == "POST") {
            // Jika token tidak valid maka tampilkan pesan error
            if ( !CSRF::validate($_POST) ) {
            	throw new Exception("Bad CSRF token", 500);
            } 
        }

        $this->processRoute();
    }

}