<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */
    /**结果集返回类型
     * FETCH_CLASS  对象型
     * FETCH_ASSOC  数组型
     */
    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => database_path('database.sqlite'),
            'prefix'   => '',
        ],

        'mysql' => [               //env(配置值，默认值)函数专门读取.env文件里的配置
            'driver'    => 'mysql',                     //驱动
            'host'      => env('DB_HOST', 'localhost'), //mysql主机地址
            'database'  => env('DB_DATABASE', 'forge'), //数据库名称
            'username'  => env('DB_USERNAME', 'forge'), //用户名
            'password'  => env('DB_PASSWORD', ''),      //密码
            'charset'   => 'utf8',                      //字符集
            'collation' => 'utf8_unicode_ci',           //排序字符集
            'prefix'    => '',                          //前缀
            'strict'    => false,                       //严格模式
        ],

        
        'mysql1' => [               //env(配置值，默认值)函数专门读取.env文件里的配置
            'driver'    => 'mysql',                     //驱动
            'host'      => env('DB_HOST', 'localhost'), //mysql主机地址
            'database'  => env('DB_DATABASE1', 'forge'), //数据库名称
            'username'  => env('DB_USERNAME', 'forge'), //用户名
            'password'  => env('DB_PASSWORD', ''),      //密码
            'charset'   => 'utf8',                      //字符集
            'collation' => 'utf8_unicode_ci',           //排序字符集
            'prefix'    => '',                          //前缀
            'strict'    => false,                       //严格模式
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
