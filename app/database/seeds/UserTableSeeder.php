<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 2,
            'email' => 1,
            'password' => 1,
            'remember_token' => 1,
            'role' => 1,
            'del_flg' => 0,
            'name' => 1,
            'tel' => 070-1234-5678,
            'post' => 111-1111,
            'address' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
