<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buildings;

class BuildingsSeeder extends Seeder
{

    public function run()
    {
      
      $faker = \Faker\Factory::create();

      for ($i=0; $i < 5; $i++) {
          Buildings::create([
            'name' => $faker->name,
          ]);
      }
    }
}
