<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Post;
class UserController extends Controller
{
    /**
     * 显示功能
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id=1)
    {
        return 'sss'.$id;
    }
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function con1($id=1)
    {
        // 通过别名来创建url
        echo route('con1',['id'=>$id]);
    }
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function con2($id=1)
    {
        // 通过别名来创建url
        echo route('con2',['id'=>$id]);
    }















    

/********请求***************************************** */
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    
    public function qingqiu(Request $request/*注入*/)
    {
        /* 基本信息的获取*/
        // 请求方法的获取
        $method = $request -> method();//GET
        // 检测请求方法
        $isMethod = $request -> isMethod('post');//false
        // 请求路径
        $path = $request -> path();//request
        // 获取完整url
        $url = $request -> url();//http://class111.com/request
        // 获取请求的ip
        $ip = $request -> ip();//127.0.0.1  请求方的ip地址
        // 获取完整url
        $getPort = $request -> getPort();//80

        // echo $method;
        // var_dump($isMethod);
        // echo $path;
        // echo $url;
        // echo $ip;
        // echo $getPort;

        /* 提取请求参数*/
        // 基本获取
        $name = $request -> input('name');
        // 设置默认值
        $word = $request -> input('word',111);
        // 检测是否存在
        $vip = $request -> has('vip');
        // 提取所有的参数
        $all = $request -> all();
        // 提取部分
        $res = $request -> only(['name','word']);
        // 剔除不需要的参数
        $excRes = $request -> except(['name']);
        // 获取头部信息
        $cookie = $request -> header('cookie');

        var_dump($name); 
        var_dump($word); 
        var_dump($vip); 
        var_dump($all); 
        var_dump($res); 
        var_dump($excRes); 
        var_dump($cookie); 




    }
    // 显示form表单
    public function file()
    {
        return view('upload');
    }
    // 文件上传
    public function upload(Request $request)
    {

        /* 文件操作*/
        // 检测是否有文件上传
        $hasFile = $request -> hasFile('profile');

        if ($hasFile) {
            // 将文件移动到指定位置(文件夹位置，文件新名称)
            // php文件中的相对路径 都是相对于当前正在请求的文件public/index.php
            $move = $request -> file('profile')->move('./upload','111.jpg');
            var_dump($move);
        }

        var_dump($hasFile);
    }



    // cookie操作
    public function cookie(Request $request)
    {

        /* cookie操作*/
        // 写入cookie
        // (键名，键值，生命周期时间)  时间单位为分钟
        // \Cookie::queue('first-cookie','111111',10);
        // 第二种方法
        // return response('')->withCookie('first-cookie','111111',10);


        // 读取cookie
        // $res = \Cookie::get('first-cookie');
        $res = $request -> cookie('first-cookie');

        var_dump($res);
    }

    // 闪存操作
    public function flash(Request $request)
    {
        /* 闪存信息*/
        // 存完只能用一次  用完就被删除
        // // 将所有的请求写入闪存
        // $request -> flash();
        // // 将部分参数写入闪存
        // $request -> flashOnly('name','age');
        // // 闪存去除某些参数之外的参数
        // $request -> flashExcept('age');
        // 自定义闪存
        \Session::flash('name','xiaoming');
        // // 读取闪存
        // echo old('name');
        // // 或者
        // echo session('name');
        // 返回上一页
        // return back();
    }
    public function getFlash(Request $request)
    {
        var_dump(old('name'));
        var_dump(session('name'));
    }


/********响应***************************************** */

public function response(Request $request)
{
    // 返回并设置cookie
    // return response('') -> withCookie('name','222',10);
    
    // 返回json字符串
    // return response() -> json(['name' => 'x','age' => 1]);
    
    // 文件下载 (相对路径   绝对路径)
    // return response() -> download('./upload/111.jpg');

    // 页面跳转  response()->redirect();
    // return redirect('/file');//内部跳转
    // return redirect('www.baidu.com');//外部跳转

    // 显示模板  response() -> view();
    // return view('upload');

    // 设置响应头
    return response('123') -> header('name','123');
}




/********数据库基本操作***************************************** */

public function db()
{
    // 查找
    // $res = DB::select("select * from goods where id < 50");
    // $res = DB::select('select * from goods where id < ?', [1]);
    // $res = DB::select('select * from goods where id < :id', ['id' => 1]);
    
    // 插入
    // $res = DB::insert('insert into goods (num, name) values (?, ?)', [1, 'Dayle']);
    // $res = DB::insert('insert into goods (num, name) values (:num, :name)', ['num' => 100000, 'name' => 'haha']);
    
    // 修改
    // $res = DB::update('update goods set votes = ? where name = ?', [100,'John']);
    // $res = DB::update('update goods set votes = :votes where name = :name', ['votes' => 100, 'name' => 'John']);
    
    // 删除
    // $res = DB::delete('delete from goods where id < ?', [30]);
    // $res = DB::delete('delete from goods where id < :id', ['id'=>30]);
    
    // 一般语句
    // 创建表
    $res = DB::statement("create table goods (id int primary key auto_increment, name char(40), num int, cid int, gid int)");
    // 删除表
    // $res = DB::statement("drop table goods");
    
    // 事物操作
    // // 手动操作事务 开启事务
    // DB::beginTransaction();
    // // 还原事务
    // DB::rollBack();
    // // 提交这个事务
    // DB::commit();
    
    // DB::transaction(function () {
    //     DB::table('users')->update(['votes' => 1]);
    
    //     DB::table('posts')->delete();
    // });

    // 操作多个数据库
    // $res = DB::connection('mysql1')->select();


    // var_dump($res);

}

/************数据库查询构造器**************************** */
public function builder()
{
    // 单条插入
    // $res = DB::table('goods')->insert([
    //     'name' => 'asd',
    //     'num' => 123
    // ]);

    // 多条插入
    // $res = DB::table('goods')->insert([
    //     ['name' => 'aaaa11','num' => 1231,'cid'=>1,'gid'=>1],
    //     ['name' => 'aaaa22','num' => 1231,'cid'=>2,'gid'=>2],
    //     ['name' => 'aaaa33','num' => 1232,'cid'=>3,'gid'=>3],
    //     ['name' => 'aaaa44','num' => 1233,'cid'=>4,'gid'=>4],
    //     ['name' => 'aaaa44','num' => 1233,'cid'=>5,'gid'=>5],
    //     ['name' => 'aaaa44','num' => 1233,'cid'=>6,'gid'=>6],
    //     ['name' => 'aaaa44','num' => 1233,'cid'=>7,'gid'=>7],
    //     ['name' => 'aaaa44','num' => 1233,'cid'=>8,'gid'=>8]
    // ]);

    // 插入并获取id
    // $res = DB::table('goods')->insertGetId([
    //     'name' => 'asd11',
    //     'num' => 123
    // ]);

    // 更新
    // $res = DB::table('goods')->where('id','=',2)->update([
    //     'name' => 'qqq事大'
    // ]);

    // 删除
    // $res = DB::table('goods')->where('id','>',8)->delete();
    
    // 查询
    // $res = DB::table('goods')->get();//多条
    // $res = DB::table('goods')->first();//第一条

    // 获取单个结果中的某个字段值
    // $res = DB::table('goods')->value('name');

    // 获取结果集中的某个字段值的所有值
    // $res = DB::table('goods')->lists('name');






    // 连贯操作
    // 设置字段查询
    // $res = DB::table('goods')->select('name','id')->get();

    // $res = DB::table('goods')->where('id','<',6)->select('name','id')->get();

    // $res = DB::table('goods')->where('id','<',6)->orWhere('name','=','asd4')->get();
    
    // $res = DB::table('goods')->whereBetween('id',[3,6])->get();

    // $res = DB::table('goods')->whereIn('id',[3,5,6])->get();

    // 排序
    // desc倒序
    // $res = DB::table('goods')->orderBy('id','desc')->get();

    // 分页
    // skip take   跳过5条提取4条
    // $res = DB::table('goods')->skip(5)->take(4)->get();

    // 连接表的操作  
    /**把表goods和表cate用cate里的id和goods里的cid连接起来  并获取goods里的gid小于20的项 */
    $res = DB::table('goods')
                ->leftJoin('cate','cate.id','=','goods.cid')
                ->where('goods.gid','<',5)
                ->get();


    // 运算
    // 统计
    // $res = DB::table('goods')->count();
    // $res = DB::table('goods')->where('id','<',4)->count();
    // 最值和平均值获取
    // $res = DB::table('goods')->max('num');
    // $res = DB::table('goods')->min('num');
    // $res = DB::table('goods')->avg('num');

    // sql语句打印在页面上的方法在routes.php最上边



    dd($res);

}



/************自定义函数**************************** */
public function func()
{
    // 自动引入的  自定义函数
    love();
}


/************模型**************************** */
public function model()
{
    // // 数据添加
    // // 创建模型对象
    // $posts = new \App\model\Post;
    // // 属性添加的方式
    // $posts->title = '123';
    // $posts->content = '123';
    // $posts->created_at = date('Y-m-d H:i:s');
    // $posts->updated_at = date('Y-m-d H:i:s');
    // $posts->save();

    // // 读取   
    // // (主键id为5的数据)
    // $info = \App\model\Post::find(5);
    // echo $info->title;
    // echo $info["title"];

    // // 删除
    // // (主键id为5的数据)
    // $info = \App\model\Post::find(5);
    // $info->delete();

    // // 更新
    // $info = \App\model\Post::find(5);
    // $info->title = '222';
    // $info->content = '222';
    // $info->save();


    // // 像使用查询构造器一样使用模型
    // // 读取所有数据
    // $data = Post::get();
    // $data = Post::OrderBy('id','desc')->where('id','>','2')->get();


}


}
