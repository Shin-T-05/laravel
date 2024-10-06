<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
        'user_id' => 1,
        'item_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
    }
}
