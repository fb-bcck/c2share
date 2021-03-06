<?php

use Illuminate\Database\Seeder;
use App\Reclamation;

class ReclamationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reclamation = new Reclamation();
        $reclamation->reclamationId=1;
        $reclamation->type=1;
        $reclamation->ownerId=3;
        $reclamation->buyerId=2;
        $reclamation->historyId=12;
        $reclamation->description='Es war nicht drin, was versprochen wurde';
        $reclamation->reclamationStatus=1;
        $reclamation->save();

        $reclamation = new Reclamation();
        $reclamation->reclamationId=2;
        $reclamation->type=1;
        $reclamation->ownerId=3;
        $reclamation->buyerId=2;
        $reclamation->historyId=24;
        $reclamation->description='Lieferung schadhaft';
        $reclamation->reclamationStatus=2;
        $reclamation->save();

        $reclamation = new Reclamation();
        $reclamation->reclamationId=3;
        $reclamation->type=1;
        $reclamation->ownerId=3;
        $reclamation->buyerId=2;
        $reclamation->historyId=18;
        $reclamation->description='Ganz und gar nicht zufrieden';
        $reclamation->reclamationStatus=3;
        $reclamation->save();
    }
}
