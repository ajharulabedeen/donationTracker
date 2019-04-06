<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Utils\Util;
use App\repository\D_Impl;
use App\repository\Donations_Repo_Impl;

class UtilTest extends TestCase
{



    public function test_mother(){
        for ($i=1; $i <10 ; $i++) { 
            $r_num = rand(10, 15);
            echo("\n" . $r_num);
        }
    }

    


    /**
     * A basic test example.
     *
     * @return void
     */
    public function dateTest()
    {
        Util::getCurrentDate();
        $this->assertTrue(true);
    }
}//class
