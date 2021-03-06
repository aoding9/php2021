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
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
        // ??????
        'qiniu' => [
          'driver'  => 'qiniu',
          'domains' => [
              'default'   => 'php2021.aoding9.top', //??????????????????
              'https'     => '',         //??????HTTPS??????
              'custom'    => '',                //Useless ???????????????????????????????????? default ???
           ],
          'access_key'=> 'zGz00EIoHS1oricfsfEKdcDNypzylngZRYUEP83W',  //AccessKey
          'secret_key'=> 'c0P_G_EbKMHnZiMGp6TEcqLQdwwM394ovpNAiBd2',  //SecretKey
          'bucket'    => 'php2021',  //Bucket??????
          'notify_url'=> '',  //???????????????????????????
          'access'    => 'public',  //?????????????????? public ??? private
          'hotlink_prevention_key' => '', // CDN ????????????????????? key??? ????????? null ????????????????????????
//            'hotlink_prevention_key' => 'cbab68a279xxxxxxxxxxab509a', // ???????????????
        ],

    ],

];
