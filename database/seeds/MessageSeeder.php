<?php

use Illuminate\Database\Seeder;
use App\Messages;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Messages::create([
            'content' => 'Hallo, brauche Hilfe bei der Anmeldung, meine Email: yasin@gmx.de',
            'userId' => '0'
        ]);

        Messages::create([
            'content' => 'Wie funktioniert der Reklamationsprozess, meine Email: odysseus@gmx.de',
            'userId' => '0'
        ]);

    }
}
