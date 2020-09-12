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
    ]


];