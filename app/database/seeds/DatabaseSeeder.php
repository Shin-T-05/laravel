<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(GoodTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(HistoryTableSeeder::class);
        $this->call(CartTableSeeder::class);
    }
}
