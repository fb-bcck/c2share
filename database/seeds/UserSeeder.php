<?php

use Illuminate\Database\Seeder;
use App\User;
use App\History;
use App\Reclamation;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id=1;
        $user->name = 'Admin';
        $user->email = 'test@test.de';
        $user->password= bcrypt('testtest');
        $user->telefonnr = '0176/3452847';
        $user->street='Sesamstraße';
        $user->houseNo='10';
        $user->PLZ='74223';
        $user->isAdmin=TRUE;
        $user->save();

        $user2 = new User();
        $user2->id=2;
        $user2->name = 'Dummy';
        $user2->email = 'dummy@dummy.de';
        $user2->password= bcrypt('testtest');
        $user2->telefonnr = '-------';
        $user2->street='-----';
        $user2->houseNo='-';
        $user2->PLZ=00000;
        $user2->isAdmin=FALSE;
        $user2->save();

        $user3 = new User();
        $user3->id=3;
        $user3->name = 'Der Inserter';
        $user3->email = 'toolmaster@gmx.de';
        $user3->password= bcrypt('testtest');
        $user3->telefonnr = '-------';
        $user3->street='-----';
        $user3->houseNo='-';
        $user3->PLZ=00000;
        $user3->isAdmin=FALSE;
        $user3->save();



    }
}
