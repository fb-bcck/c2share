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
         $this->call(UserSeeder::class);
         $this->call(ProductCategorySeeder::class);
         $this->call(AdvertSeeder::class);
         $this->call(ReclamationTypeSeeder::class);
         $this->call(HistorySeeder::class);
         $this->call(ReclamationSeeder::class);
        $this->call(MessageSeeder::class);

    }
}
