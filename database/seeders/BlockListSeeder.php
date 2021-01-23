<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlockList;


class BlockListSeeder extends Seeder
{
    public function run()
    {

      $faker = \Faker\Factory::create();
      
      for ($i=1; $i < 6; $i++) {
          BlockList::create([
            'fk_user_id' => $i,
            'fk_building_id' => rand(1,5),
            'observation' => $faker->paragraph(mt_rand(1, 3)),
          ]);
      }
    }
}
