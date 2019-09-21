<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Util_u_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //unable to use, cally function in API testing showing that need array, found string.
    public static function getDummyPost(){
        return [ 
            'user_id'=>'Tst', 
            'title'=>'UnitT',
            'description'=>'UnitTesting of URLs',
            'total_needed'=>'2000',
            'total_collected'=>'300', 
            'total_expanse'=>'800',
            'start_date'=>'20-09-2019',
            'end_date'=>'20-10-2019',
            'active'=>'1',
            'updated_at'=>'20-10-2019',
            'created_at'=>'20-10-2019'];
    }
}
