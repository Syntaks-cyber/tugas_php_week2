<?php

return [

    /*
    |--------------------------------------------------------------------------
<<<<<<< HEAD
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for every one. Here you may define a default connection.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'sync'),
=======
    | Default Queue Driver
    |--------------------------------------------------------------------------
    |
    | The Laravel queue API supports a variety of back-ends via an unified
    | API, giving you convenient access to each back-end using the same
    | syntax for each one. Here you may set the default queue driver.
    |
    | Supported: "null", "sync", "database", "beanstalkd",
    |            "sqs", "redis"
    |
    */

    'default' => env('QUEUE_DRIVER', 'sync'),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Laravel. You are free to add more.
    |
<<<<<<< HEAD
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
<<<<<<< HEAD
            'retry_after' => 90,
=======
            'expire' => 60,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
<<<<<<< HEAD
            'retry_after' => 90,
            'block_for' => 0,
=======
            'ttr' => 60,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],

        'sqs' => [
            'driver' => 'sqs',
<<<<<<< HEAD
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'your-queue-name'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
=======
            'key' => 'your-public-key',
            'secret' => 'your-secret-key',
            'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
            'queue' => 'your-queue-name',
            'region' => 'us-east-1',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
<<<<<<< HEAD
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
=======
            'queue' => 'default',
            'expire' => 60,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */

    'failed' => [
<<<<<<< HEAD
        'driver' => env('QUEUE_FAILED_DRIVER', 'database'),
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
