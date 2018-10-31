<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $users = [
            
            [
                'name' => "Hassan",
                'email' => 'hassan@dmin.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
                 [
                'name' => "Ahmad",
                'email' => 'Ahmad@dmin.com',
                'password' => Hash::make('123123'),
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            
           
           
        ];

        DB::table('users')->insert($users);
    }

}
