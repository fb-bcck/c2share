<?php

use Illuminate\Database\Seeder;
use App\ReclamationType;

class ReclamationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ReclamationType::create([
            'reclamationTypeId'=>'1',
            'description'=>'Verspätete Lieferung',
            'created_at'=>NOW(),
            'updated_at'=>NOW(),
        ]);

        ReclamationType::create([
            'reclamationTypeId'=>'2',
            'description'=>'Beschädigung',
            'created_at'=>NOW(),
            'updated_at'=>NOW(),
        ]);

        ReclamationType::create([
            'reclamationTypeId'=>'3',
            'description'=>'Artikel entspricht nicht der Anzeige',
            'created_at'=>NOW(),
            'updated_at'=>NOW(),
        ]);

        ReclamationType::create([
            'reclamationTypeId'=>'4',
            'description'=>'Minderlieferung',
            'created_at'=>NOW(),
            'updated_at'=>NOW(),
        ]);
    }
}
