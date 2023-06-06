<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
<<<<<<< HEAD
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),
=======
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'local',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

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

<<<<<<< HEAD
    'cloud' => env('FILESYSTEM_CLOUD', 's3'),
=======
    'cloud' => 's3',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
<<<<<<< HEAD
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
<<<<<<< HEAD
            'url' => env('APP_URL').'/storage',
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
<<<<<<< HEAD
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
=======
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],

    ],

<<<<<<< HEAD
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

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
];
