<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// sql语句记录
// Event::listen('illuminate.query',function($query){
//     var_dump($query);
// });



Route::group([],function(){

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/aaa/{aass}-{id}', function ($aass,$id) {
        echo 'aaa:' . $aass . ',id:' . $id;
    })->where('id','\d+');
    
    // 路由别名  方便创建url
    Route::get('/Admin/User/index', [
        'as'=>'ulist',
        'uses'=>function(){
            // route是一个函数  通过路由别名来快速创建完整url
            echo route('ulist');//http://class.com/laravel/mylaravel/public/Admin/User/index
        }
    ]);


    // 中间件  php artisan make:middleware TestMiddleware (--plain)
    // 路由中间件的使用
    Route::get('/login', function () {
        echo '登录页';
    });
    Route::get('/showSession', function () {
        echo session('uid');
    });
    Route::get('/delSession', function () {
        echo session()->forget('uid');
    });
    Route::get('/setting', [
        'middleware'=>'login',
        'uses'=>function(){
            echo 'setting';
        }
    ]);
    Route::get('/setting1',function(){
            echo 'setting1';
    })->middleware('login');
    // 写入session uid
    Route::get('/session',function(){
        session(['uid'=>1]);
    });


});

// 控制器  php artisan make:controller TestController (--plain)
// 当用户请求服务器上的/controller路径时，会执行UserController控制器文件中的show方法
Route::get('/controller/{id?}','UserController@show');

// 别名
Route::get('/controller1/{id?}',[
    'as' => 'con1',
    'uses' => 'UserController@con1'
]);

// 控制器+中间件
Route::get('/controller2/{id?}',[
    'middleware' => 'login',
    'as' => 'con2',
    'uses' => 'UserController@con2'
]);
// Route::get('/controller/{id?}','UserController@con2')->middleware('login');

// 隐式控制器  如果是goods开头的路径 都是交给GoodsController来实现
Route::controller('goods','GoodsController');

// RESTful 资源控制器  php artisan make:controller ArticleController
// 只能有7个方法 
Route::resource('article', 'ArticleController');


/********请求***************************************** */

/**基本信息的获取 */
Route::get('/request','UserController@qingqiu');

/* 文件操作*/
Route::get('/file','UserController@file');

Route::post('/upload','UserController@upload');

/**cookie操作 */
Route::get('/cookie','UserController@cookie');

/**闪存操作 */
Route::get('/flash','UserController@flash');
Route::get('/getFlash','UserController@getFlash');



/********响应***************************************** */


Route::get('/response','UserController@response');



/********数据库操作***************************************** */
Route::get('/db','UserController@db');




/********查询构造器***************************************** */
Route::get('/builder','UserController@builder');






/**
 * 数据迁移
 * 创建命令
 * php artisan make:migration test
 * 文件位置:database\migrations
 */
/**
 * 数据填充
 * 创建命令
 * php artisan make:seeder testSeeder
 * 文件位置:database\seeds
 */
/**
 * 自定义函数和自定义类文件
 */
 // 1、在app文件夹下创建文件夹及自定义文件
    //  app/Library/helper.php
 // 2、在composer.json中添加信息
    // "autoload": {
    //     "classmap": [
    //         "database"
    //     ],
    //     "psr-4": {
    //         "App\\": "app/"
    //     },
    //     "files":[
    //         "app/Library/helper.php"
    //     ]
    // }
 // 3、执行命令:composer dump-auto
 // 4、用法
 Route::get('/func','UserController@func');



/**
 * 调试工具
 * 1、debugbar
 */
// 1、安装：composer require barryvdh/laravel-debugbar --dev
// 2、在config/app.php里的providers添加
//    Barryvdh\Debugbar\ServiceProvider::class,


/**
 * 模型（第三种操作数据库的方法）
 * （第一种，原生sql语句，第二种，DB::）
 */
/**
 * 1、创建模型 (加m会自动帮我们创建一个数据库的迁移文件)
 *  php artisan make:model Table (-m)
 * 默认创建在app目录下 可以用model/Table指定到文件夹里
 */
/**
 * 2、模型限定(创建规则)
 * (模型所对应的默认的表名是模型名的复数形式，如果模型名后边有s，则同名，如果为y则换成ies)
 * (默认主键是id)
 * (默认添加时间字段created_at updated_at)
 * 
 */
/**
 * 3、属性设置 在模型文件中(修改规则)
 * (设置操作的表名)public $table = 'post';
 * (修改默认的主键名称)public $primaryKey = 'aid';
 * (设置默认的时间字段)public $timestamps = false;
 */
/**
 * 模型的基本操作
 */
 Route::get('/model','UserController@model');









