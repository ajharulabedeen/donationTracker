<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Route_Testing extends TestCase
{
    public function testMain()
    {
        // $this->BasicExample();//working
        // $this->postSave(); //working
        // $this->postDelete(58);// working
        // $this->postFindOne(59); // working
        $this->postUpdate(); // working
    }


    public function postUpdate()
    {
        $postDummy =  [
            'id'=>'59',
            'user_id' => 'Tst',
            'title' => 'Post title 59 updated.',
            'description' => 'UnitTesting of URLs',
            'total_needed' => '2000',
            'total_collected' => '300',
            'total_expanse' => '800',
            'start_date' => '20-09-2019',
            'end_date' => '20-10-2019',
            'active' => '1',
            'updated_at' => '20-10-2019',
            'created_at' => '20-10-2019'
        ];
        $response = $this->json('POST', '/update_post', $postDummy);
        dd($response);
    }

    public function postFindOne($id)
    {
        $response = $this->json('GET', '/single_post/' . $id);
        dd($response);
    }

    //passed
    public function postDelete($id)
    {
        $response = $this->json('POST', '/delete_post/' . $id);
        dd($response);
        // $response->assertStatus(201)->assertJson($data);
    }

    //passed
    public function postSave()
    {
        $postDummy =  [
            // 'id'=>'54',
            'user_id' => 'Tst',
            'title' => 'UnitT',
            'description' => 'UnitTesting of URLs',
            'total_needed' => '2000',
            'total_collected' => '300',
            'total_expanse' => '800',
            'start_date' => '20-09-2019',
            'end_date' => '20-10-2019',
            'active' => '1',
            'updated_at' => '20-10-2019',
            'created_at' => '20-10-2019'
        ];
        $response = $this->json('POST', '/save_post', $postDummy);
        dd($response);
        // $response->assertStatus(201)->assertJson($postDummy);
    } //posSave


    public function BasicExample()
    {
        $name =  "Sally";
        echo "\n==== Basic Example Test ====\n";
        $data = ['name' => 'Sally'];
        $dat = ['cat' => 'Sally'];
        $response = $this->json('POST', '/getZ', $data);
        // error_log($response->get_);
        // error_log($response->get_headers());
        // dd($response);
        // error_log($response->statusCode);
        // $response->assertStatus(200);
        // $response->assertJson($dat);//working
        // $response->assertJson() //working
        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Sall',
            ]);
    }
}//class
