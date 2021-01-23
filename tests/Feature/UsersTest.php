<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UsersTest extends TestCase
{
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
        $response = $this->post('/');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertStatus(200);
    }
}
