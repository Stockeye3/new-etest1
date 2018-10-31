<?php

use Illuminate\Database\Seeder;
class CustomersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $customers = [
            
            [
                'fname' => "customer1",
                'lname' => 'last1',
                'phone' => "12376345",
                'address' => "Beirut",
                'email' => '1@customer.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'fname' => "Customer2",
                'lname' => 'Last2',
                'phone' => "12423345",
                'address' => "Tripoli",
                'email' => '2@customer.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'fname' => "Customer3",
                'lname' => 'Last3',
                'phone' => "12389745",
                'address' => "Saida",
                'email' => '3@customer.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'fname' => "Customer4",
                'lname' => 'Last4',
                'phone' => "45612345",
                'address' => "Beirut",
                'email' => '4@customer.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],[
                'fname' => "Customer5",
                'lname' => 'Last5',
                'phone' => "12880345",
                'address' => "Jounieh",
                'email' => '5@customer.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
            
            
           
        ];

        DB::table('customers')->insert($customers);
    }

}
