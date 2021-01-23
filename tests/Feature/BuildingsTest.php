<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Buildings;
use Tests\TestCase;

class BuildingsTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function index_test()
    {
        $response = $this->get('/');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertStatus(200);
    }

    /** @test */
    public function store_test()
    {
      //$this->withoutExceptionHandling();

      $faker = \Faker\Factory::create();

      $data = [
          'name' => $faker->name,
      ];

      $this->post('api/buildings', $data)
          ->assertStatus(200);

    }

    /** @test */
    public function show_test()
    {
      $faker = \Faker\Factory::create();

      $building = Buildings::create([
        'name' => $faker->name,
      ]);

      $this->get('api/buildings/'.$building->id)
            ->assertStatus(200);
    }

    /** @test */
    public function update_test()
    {
      $faker = \Faker\Factory::create();

      $building = Buildings::create([
        'name' => $faker->name,
      ]);

      $data = [
        'name' => $faker->name,
        ];

      $this->put('api/buildings/'.$building->id, $data)
            ->assertStatus(200);

    }

    /** @test */
    public function delete_test() {

      $faker = \Faker\Factory::create();

      $building = Buildings::create([
        'name' => $faker->name,
      ]);

      $this->delete('api/buildings/'.$building->id)
            ->assertStatus(200);
    }
}
