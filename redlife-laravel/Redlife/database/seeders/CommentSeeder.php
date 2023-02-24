<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //https://codersfree.com/blog/documentacion-de-la-libreria-faker-php-traducida-al-espanol

        for ($i=0; $i < 10; $i++) { 
            DB::table('comments')->insert([
                'user_id' => $i+1,
                'image_id' => $i+1,
                'content' => $faker->jobTitle,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
    }
}
