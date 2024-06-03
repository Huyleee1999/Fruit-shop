<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 15;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('fruits')->insert([
                'name' => $faker->word, 
                'description' => $faker->sentence, 
                'price' => $faker->randomFloat(2, 0.5, 20), 
                'image' => $faker->imageUrl(640, 480, 'fruits', true), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}   
