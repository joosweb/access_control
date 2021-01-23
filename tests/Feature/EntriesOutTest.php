<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\EntriesOut;
use Tests\TestCase;

class EntriesOutTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function index_test()
    {
        $response = $this->get('api/entries-out');
        $response->assertStatus(200);
    }

    /** @test */
    public function store_test()
    {
      $faker = \Faker\Factory::create();

      $data = [
          'fk_user_id' => rand(1,10),
          'fk_building_id' => rand(1,5),
          'action' => rand(0,1),          
      ];

      $this->post('api/entries-out', $data)
          ->assertStatus(200);
    }
}
