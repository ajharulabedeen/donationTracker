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
        $postDummyUpdate =  [
            'id'=>'2',
            'user_id' => 'Tst',
            'title' => 'Post title 59 updated.',
            // 'description' => 'UnitTesting of URLs',
            // 'total_needed' => '2000',
            // 'total_collected' => '300',
            // 'total_expanse' => '800',
            // 'start_date' => '20-09-2019',
            // 'end_date' => '20-10-2019',
            // 'active' => '1',
            // 'updated_at' => '2019-02-11',
            // 'created_at' => '2019-02-21'
        ];
        $response = $this->json('POST', '/update_post', $postDummyUpdate);
        dd($response);
        // $response->assertExactJson(['false']);//not working.
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
    /**
     * for successful save an ID will be returned in the content data,
     * if #content: "82", any value other than "-1", data saved.
     * if #content: "-1", means data has not been saved for any reason. 
     */
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
            'updated_at' => '2019-10-10',
            'created_at' => '2019-20-10'
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
