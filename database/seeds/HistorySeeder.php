<?php

use Illuminate\Database\Seeder;
use App\History;
class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        History::create([
            'title'=>'Schlauchboot',
            'description'=>'Luft nicht mit inbegriffen',
            'sellerId'=>'1',
            'buyerId'=>'2'
        ]);

        History::create([
            'title'=>'Quietscheente',
            'description'=>'Quietscht in Dolby Atmos 5.1',
            'sellerId'=>'2',
            'buyerId'=>'1'
        ]);
    }
}
