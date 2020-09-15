<?php 

$web = [
    [
        'url' => '',
        'direction' => 'Beranda',
        'type' => 'view'
    ],

    /**
     * Tipe controller 
     * akan mengambil class helloController
     * dan method bernama index
     */

    [
        'url' => 'hello',
        'direction' => 'helloController@index',
        'type' => 'controller'
    ],

    [
        'url' => 'tweet',
        'direction' => 'tweetController@index',
        'type' => 'controller'
    ],

    [
        'url' => 'create',
        'direction' => 'create',
        'type' => 'view'
    ],
    [
        'url' => 'store',
        'direction' => 'tweetController@store',
        'type' => 'controller'
    ],
    [
        'url' => 'update',
        'direction' => 'tweetController@update',
        'type' => 'controller'
    ],
    [
        'url' => 'edit',
        'direction' => 'tweetController@edit',
        'type' => 'controller'
    ],
    [
        'url' => 'delete',
        'direction' => 'tweetController@delete',
        'type' => 'controller'
    ],

    [
        'url' => 'login',
        'direction' => 'authController@login',
        'type' => 'controller'
    ],
    [
        'url' => 'register',
        'direction' => 'authController@register',
        'type' => 'controller'
    ],
    [
        'url' => 'masuk',
        'direction' => '/Auth/login',
        'type' => 'view'
    ],
    [
        'url' => 'registrasi',
        'direction' => '/Auth/register',
        'type' => 'view'
    ],
    [
        'url' => 'keluar',
        'direction' => 'authController@logout',
        'type' => 'controller'
    ],


];