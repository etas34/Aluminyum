<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            ['name' => "Admin",
                'email' => 'admin@mail.com',
                'password' => bcrypt('1'),
                'yetki'=>'1,2,3,4,5']
        ]);
    }
}
