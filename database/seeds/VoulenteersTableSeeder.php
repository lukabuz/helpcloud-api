<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Offer;
use App\OfferVoulenteer;
use App\Voulenteer;

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
        $offers = Offer::all()->random(2);

        $id = DB::table('voulenteers')->insert([
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'profession' => $faker->word,
            'country' => $faker->country,
            'city' => $faker->city,
            'general_location' => $faker->streetName,
            'description' => $faker->paragraph,
        ]);

        foreach ($offers as $offer) {
            $relation = new OfferVoulenteer;
            $relation->offer_id = $offer->id;
            $relation->voulenteer_id = Voulenteer::orderBy('id', 'DESC')->first()->id;
            $relation->save();
        }
    }
}
