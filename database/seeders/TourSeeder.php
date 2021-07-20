<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use DB;
class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for($i=0;$i<10;$i++){
            DB::table('tours')->insert([
                'name'=>$faker->name,
                'description'=>$faker->text,
                'price'=>random_int(1,500),
                'travel_day'=>random_int(1,500),
                'schedule'=>random_int(1,500),
                'departure_place'=>$faker->address,
                'category_id'=>random_int(1,10),
            ]);
        }
    }
}
