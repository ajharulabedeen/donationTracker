<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTestFeature()
    {
        $response = $this->get("/z_web");
        // $response = $this->get("/all_posts/3");
        // dd($response->content);//not wokring
        // dd($response);
        // error_log($response->status);

        $response->assertStatus(200);
    }
}
