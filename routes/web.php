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
    ]
];