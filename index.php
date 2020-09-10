<?php

/**
 * myFramework
 * versi 1
 * 
 * Projek ini adalah sebuah projek yang digunakan
 * untuk pembelajaran pada buku yang berjudul
 * Membuat mini framework php seperti laravel
 * 
 */

 require 'vendor/autoload.php';

 /**
  * Jalankan aplikasi ini dengan memanggil
  * method start pada file core.php
  */

  use App\core;

  $core = new core();
  $core->start();