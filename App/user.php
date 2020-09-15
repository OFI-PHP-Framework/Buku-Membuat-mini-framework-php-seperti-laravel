<?php

namespace App;

/**
 * Panggil class Model dari package 
 * database laravel tadi
 */
use Illuminate\Database\Eloquent\Model;

class user extends Model {

    // Memilih database yang akan kita eksekusi
    // dengan model ini

    protected $table = 'user';

}