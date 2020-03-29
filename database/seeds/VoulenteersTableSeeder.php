<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VoulenteersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('voulenteers')->insert([
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'profession' => $faker->word,
            'country' => $faker->country,
            'city' => $faker->city,
            'general_location' => $faker->streetName,
            'description' => $faker->paragraph,
        ]);
    }
}
