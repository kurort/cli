<?php

return [

    'filesystems' => [

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

        'default' => 'global',

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

        'disks' => [

            'global' => [
                'driver' => 'local',
                'root' => '/',
            ],

            'nginx' => [
                'driver' => 'local',
                'root' => '/etc/nginx',
            ],

            'home' => [
                'driver' => 'local',
                'root' => '/home',
            ],

            'stubs' => [
                'driver' => 'local',
                'root' => __DIR__.'/../stubs',
            ],
        ],
    ],
];