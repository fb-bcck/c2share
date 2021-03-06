<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'productCategory' => '1',
            'description' => 'Auto, Rad und Boot',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '2',
            'description' => 'Dienstleistungen',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '3',
            'description' => 'Elektronik',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '4',
            'description' => 'Familie,Kind und Baby',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '5',
            'description' => 'Freizeit und Hobby',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '6',
            'description' => 'Immobilien',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '7',
            'description' => 'Musik,Filme und Bücher',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);

        ProductCategory::create([
            'productCategory' => '8',
            'description' => 'Garten und Baustelle',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);



        ProductCategory::create([
            'productCategory' => '9',
            'description' => 'Sonstige',
            'created_at' => NOW(),
            'updated_at' =>  NOW()
        ]);
    }
}
