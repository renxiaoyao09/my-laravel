<?php

use Illuminate\Database\Seeder;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 数据填充 多个表的填充
     * 运行指令 php artisan db:seed
     * 需要在DataBaseSeeder.php里先注入要填充的seeder
     * @return void
     */
    /**
     * Run the database seeds.
     * 数据填充 单个表的填充
     * 运行指令 php artisan db:seed --class=testSeeder
     * @return void
     */
    public function run()
    {
        //
        $arr = [];
        // 循环
        for ($i=0; $i < 20; $i++) { 
            $tmp = [];
            // str_random(n)   n长度的随机字符串
            $tmp['username'] = str_random(20);
            $tmp['password'] = str_random(20);
            $tmp['nickname'] = str_random(10);
            $tmp['group_id'] = rand(1,10);
            $tmp['email'] = rand(100000,999999).'@qq.com';
            $tmp['sex'] = rand(0,1);
            $tmp['age'] = rand(10,60);
            $tmp['created_at'] = date('Y-m-d H:i:s');
            $tmp['updated_at'] = date('Y-m-d H:i:s');

            // 压入到数组中
            $arr[] = $tmp;
        }
        // 插入
        DB::table('test')->insert($arr);
    }
}
