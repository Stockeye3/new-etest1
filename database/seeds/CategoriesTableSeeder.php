<?php

use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $categories = [
            [
                'name' => "Long Sandwiches",
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
            [
                'name' => "Short Sandwiches",
                'visible' => true,
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('categories')->insert($categories);
    }

}
