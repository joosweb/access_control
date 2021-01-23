<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\User;
use Tests\TestCase;

class UsersTest extends TestCase
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
          'email' => $faker->unique()->safeEmail,
          'email_verified_at' => now(),
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'remember_token' => Str::random(10),
      ];

      $this->post('api/users', $data)
          ->assertStatus(200);

    }

    /** @test */
    public function show_test()
    {
      $faker = \Faker\Factory::create();

      $post = User::create([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ]);

      $this->get('api/users/'.$post->id)
            ->assertStatus(200);
    }

    /** @test */
    public function update_test()
    {
      $faker = \Faker\Factory::create();

      $post = User::create([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ]);

      $data = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        ];

      $this->put('api/users/'.$post->id, $data)
            ->assertStatus(200);

    }

    /** @test */
    public function delete_test() {

      $faker = \Faker\Factory::create();

      $post = User::create([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ]);

      $this->delete('api/users/'.$post->id)
            ->assertStatus(200);
    }
}
