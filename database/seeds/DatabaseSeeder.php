<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        // testSeeder注入  
        // 命令:php artisan db:seed
        $this->call(testSeeder::class);

        Model::reguard();
    }
}
