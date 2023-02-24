<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'Admin',
            'name' => 'Bryan',
            'last_name' => 'Reyes',
            'nick' => 'Furia1799',
            'email' => 'furia1799@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'face.jpg',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'remember_token' => null
        ]);

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'role' => 'Client',
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'nick' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('12345'),
                'image' => 'face' . $i . '.jpg',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'remember_token' => null
            ]);
        }
    }
}
