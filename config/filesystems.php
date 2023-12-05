<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => base_path('public/assets'),
            'url' => env('APP_URL').'/public/assets',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

        'ftp' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT'),
        ],

        'ftp1' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT1'),
        ],

        'ftp2' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT2'),
        ],

        'ftp3' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT3'),
        ],

        'ftp4' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT4'),
        ],

        'ftp5' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT5'),
        ],

        'ftp6' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT6'),
        ],

        'ftp7' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT7'),
        ],

        'ftp8' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT8'),
        ],

        'ftp9' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT9'),
        ],

        'ftp10' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT10'),
        ],

        'ftp11' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT11'),
        ],

        'ftp12' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT12'),
        ],

        'ftp13' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT13'),
        ],

        'ftp14' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT14'),
        ],

        'ftp15' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT15'),
        ],

        'ftp16' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT16'),
        ],

        'ftp17' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT17'),
        ],

        'ftp18' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT18'),
        ],

        'ftp19' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT19'),
        ],

        'ftp20' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT20'),
        ],

        'ftp22' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT22'),
        ],

        'ftp23' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT23'),
        ],

        'ftp24' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT24'),
        ],

        'ftp25' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT25'),
        ],

        'ftp26' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT26'),
        ],

        'ftp27' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT27'),
        ],

        'ftp28' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'port'     => env('FTP_PORT'),
            'root' => env('FTP_ROOT28'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
