<?php

use Illuminate\Database\Seeder;
class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $products = [
            
            [
                'name' => "falefil",
                'description' => 'Sandwish Falefil.',
                'qty' => 30,
                'price' => 2.33,
                'category_id' => 1,
                'filename' => 'php3B13.tmp.png',
                'mime' => 'image/png',
                'original_filename' => 'falefil.png',
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
           
            [
                'name' => "tawook",
                'description' => 'Sandwish Tawook.',
                'qty' => 50,
                'price' => 5,
                'category_id' => 1,
                'filename' => 'php6BC8.tmp.png',
                'mime' => 'image/png',
                'original_filename' => 'tawook.png',
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "batata",
                'description' => 'Sandwish Batata.',
                'qty' => 100,
                'price' => 2,
                'category_id' => 1,
                'filename' => 'php9D88.tmp.png',
                'mime' => 'image/png',
                'original_filename' => 'batata.png',
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "Meat",
                'description' => 'Sandwish lahme.',
                'qty' => 30,
                'price' => 4,
                'category_id' => 2,
                'filename' => 'phpD031.tmp.png',
                'mime' => 'image/png',
                'original_filename' => 'meat.png',
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "Chicken",
                'description' => 'Sandwish Djej.',
                'qty' => 30,
                'price' => 4.5,
                'category_id' => 2,
                'filename' => 'phpE87D.tmp.png',
                'mime' => 'image/png',
                'original_filename' => 'chicken.png',
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('products')->insert($products);
    }

}
