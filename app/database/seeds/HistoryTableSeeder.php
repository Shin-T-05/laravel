<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class HistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('histories')->insert([
            'user_id' => 1,
            'item_id' => 1,
            'itemname' => 1,
            'quantity' => 1,
            'image' => 8,
            'total' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
