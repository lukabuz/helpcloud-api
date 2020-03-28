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
        DB::table('voulenteers')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'profession' => Str::random(10),
            'country' => Str::random(6),
            'city' => Str::random(4),
            'general_location' => Str::random(10),
            'description' => Str::random(50),
        ]);
    }
}
