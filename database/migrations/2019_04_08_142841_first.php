<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class First extends Migration
{
    /**
     * 
     * php artisan migrate   迁移命令(执行up)
     * php artisan migrate:refresh   刷新命令(执行down然后up)
     * 
     */
    /**
     * 
     * 检测索引是否存在
     */
    public function hasIndex($table, $name)
    {
        $conn = Schema::getConnection();
        $dbSchemaManager = $conn->getDoctrineSchemaManager();
        $doctrineTable = $dbSchemaManager->listTableDetails($table);
        return $doctrineTable->hasIndex($name);
    }
    /**
     * Run the migrations.
     *
     * @return void
     * 执行迁移的时候执行up（运行迁移）
     */
    public function up()
    {

        if(!Schema::hasTable('test')){

            // 创建表
            // 字段类型：file:///D:/xampp/htdocs/class/http/laravel/composer/laravel-china-ok/laravel-china/migrations.htm#%E5%8F%AF%E7%94%A8%E7%9A%84%E5%AD%97%E6%AE%B5%E7%B1%BB%E5%9E%8B
            Schema::create('test', function (Blueprint $table) {
                // 创建主键字段         ->注释
                $table->increments('id')->comment('主键字段');
                // 创建用户名字段           ->可以为空  ->默认值
                $table->string('username')->nullable()->default('abc');
                // 创建密码字段(长度)             ->无符号->unsigned()
                $table->char('password',10);
                // 加入 created_at 和 pdated_at 字段
                $table->timestamps();
    
                // 添加新字段
                $table->string('nickname')->comment('昵称');
                $table->string('email')->comment('邮箱');
                $table->integer('group_id')->comment('组id');
    
    
    
                // 唯一索引
                $table->unique('username');
                // 一般索引
                $table->index('email');
    
    
                // 设置表的引擎
                // $table->engine = 'innodb';
    
            });
        }else{
            // 如果表存在  调整表结构
            Schema::table('test', function ($table) {
                // 检测字段是否存在
                if (!Schema::hasColumn('test','sex')) {
                    // 添加
                    $table->tinyInteger('sex')->comment('性别');
                }
                if (!Schema::hasColumn('test','age')) {
                    $table->integer('age')->default(10);
                }

                /**
                 * 修改字段类型
                 * 得安装一个包   composer require doctrine/dbal
                 */
                if (!Schema::hasColumn('test','password')) {

                    $table->text('password')->change();
                }
                // /**
                //  * 删除字段
                //  */
                // if (!Schema::hasColumn('test','phone')) {

                //     $table->dropColumn('phone');
                // }
                // /**
                //  * 创建索引
                //  */
                // if (!Schema::hasColumn('test','group_id')) {

                //     $table->index('group_id');
                // }
                // /**
                //  * 删除索引
                //  */
                // if ($this->hasIndex('test','group_id')) {
                //     $table->dropPrimary('group_id');
                // }
                // /**
                //  * 删除唯一索引
                //  */
                // if ($this->hasIndex('test','group_id')) {
                //     $table->dropUnique('group_id');
                // }
                // /**
                //  * 删除索引
                //  */
                // if ($this->hasIndex('test','group_id')) {
                //     $table->dropIndex('group_id');
                // }
            });
        }



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 执行回滚的时候执行down（还原迁移）
     */
    public function down()
    {
        // 删除表
        // Schema::drop('test');
    }
}
