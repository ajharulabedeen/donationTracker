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
    // public function testBasicTestFeature()
    public function BasicTestFeature()
    {
        $response1 = $this->get("/z_web");
        $response2 = $this->get("/getZ");
        // $response = $this->get("/all_posts/3");
        // dd($response->content);//not wokring
        // dd($response);
        // error_log($response->status);

        // error_log($response2->status);

        //not working.
        if ($response2 == "405") {
            echo "\n------Test Two failed------\n";
        }
        // $response1->assertStatus(200);
        // $response2->assertStatus(405);
    }

    public function testBasicExample()
    {

        $response = $this->json('POST', '/getZ', ['name' => 'Sally']);
        error_log($response->name);
        dd($response);
        error_log($response);
        echo "\n\n---------TestCode.--------\n\n";

        $response->assertStatus(200);
    }
}
