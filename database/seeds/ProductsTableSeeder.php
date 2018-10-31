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
                'photo' => 'https://www.e7kky.com/uploads/1474528340.jpg',
                'category_id' => 1,
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
           
            [
                'name' => "tawook",
                'description' => 'Sandwish Tawook.',
                'qty' => 50,
                'price' => 5,
                'photo' => 'http://www.dishocean.com/media/uploads/foods/shish-tawook-sandwich-al-barza-restaurant-jumeirah-1-dubai.jpg',
                'category_id' => 1,
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "batata",
                'description' => 'Sandwish Batata.',
                'qty' => 100,
                'price' => 2,
                'photo' => 'http://www.shawarmamatic.com/menu/batatamatic.jpg',
                'category_id' => 1,
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "Meat",
                'description' => 'Sandwish lahme.',
                'qty' => 30,
                'price' => 4,
                'photo' => 'http://static1.squarespace.com/static/588e5a5dd1758e87f0663ab7/5890b63af7d1ff19cd8c8094/5890b649f7d1ff19cd8c8774/1485878857334/roastbeef5.jpg?format=original',
                'category_id' => 2,
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "Chicken",
                'description' => 'Sandwish Djej.',
                'qty' => 30,
                'price' => 4.5,
                'photo' => 'http://elgranescapequepos.com/wp-content/uploads/2017/09/Buffalo-Chicken.jpg',
                'category_id' => 2,
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('products')->insert($products);
    }

}
