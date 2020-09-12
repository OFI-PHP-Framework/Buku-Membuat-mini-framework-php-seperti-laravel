<?php

namespace App;

/**
 * Panggil class Model dari package 
 * database laravel tadi
 */
use Illuminate\Database\Eloquent\Model;

/**
 * dan kita buat extends kedalam
 * class tweet kita
 */

class tweet extends Model {

    // Memilih database yang akan kita eksekusi
    // dengan model ini

    protected $table = 'tweet';

}