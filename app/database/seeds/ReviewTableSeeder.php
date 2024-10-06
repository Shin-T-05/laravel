<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 1,
            'item_id' => 1,
            'title' => 8,
            'comment' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
