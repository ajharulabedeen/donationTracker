<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\repository\Expanse_Repo_Impl;
use App\Utils\Util;
use App\models\Expanses;

class RepoExpanseTest extends TestCase
{

    public function test_root(){
        // $this->saveTest();
        // $this->saveManyTest();
        // $this->updateTest();
        // $this->deleteTest(2);
        // $this->getAllTest();
        // $this->getAllExpanseTest(10);
        $this->getAllExpanseAmountTest(12);
    }

    public function getAllExpanseAmountTest($id){
        $expanseRepo = new Expanse_Repo_Impl;
        echo( "\n Total Expanse : " . $expanseRepo->getTotalExpanseDone($id) . "\n");
    }


    public function getAllExpanseTest($id){
        $expanseRepo = new Expanse_Repo_Impl;
        echo( "\n Total Expanse Transactions  : " . $expanseRepo->getAllExpanseCount($id) . "\n");
    }



    public function getAllTest(){
        $expanseRepo = new Expanse_Repo_Impl;
        $request = new Request();
        $request->per_page = 5;
        $request->sort_by = "ASC";
        // $request->sort_by = "DESC";
        // $request->sort_on = "amount";
        $request->sort_on = "id";
        $request->postID = 10;
        $allDonations = $expanseRepo->getAll($request);
        
        for ($i=0; $i <count($allDonations) ; $i++) { 
            $obj = new Expanses;
            $obj = $allDonations[$i];
            // print_r( $obj );
            // echo("\n\n" . $obj->__toString() . "\n\n");
            echo( "\n" . $obj->id . "  ");
            echo($obj->amount . "  ");
            echo($obj->date );
            echo( "  " .  $obj->created_at );
        }
    }//getAllTest

    public function deleteTest($id){
            $expanseRepo = new Expanse_Repo_Impl();
            $status = $expanseRepo->delete($id);   
            $this->assertTrue($status);
        }

    public function updateTest(){
            $expanseRepo = new Expanse_Repo_Impl();
            $request = new Request();
            $request->id="1";
            $request->purpose=">>>Purpose Updated...!";
            $expanse  =new Expanses();
            $expanse = $expanseRepo->update($request);   
            echo "\n" . $expanse->purpose . "\n";
        }
    
    public function saveManyTest(){
        $expanseRepo = new Expanse_Repo_Impl();
        for ($i=0; $i <100 ; $i++) { 
            $statusSave = $expanseRepo->save($this->getDummyExpanseRequest());
            $this->assertTrue($statusSave != null);
        }
    }//saveMany

    public function saveTest(){
        $expanseRepo = new Expanse_Repo_Impl();
        $statusSave = $expanseRepo->save($this->getDummyExpanseRequest());
        $this->assertTrue($statusSave != null);
    }
 

    public function getDummyExpanseRequest(){
        $request = new Request();
        $request->post_id=rand(10,15);
        $request->date=Util::getCurrentDate();
        $request->purpose="Test Purpose..!";
        $request->notes="Due to summer, heavy hot and humid, taken some drinks";
        $request->privacy_notes=rand(1,2);
        $request->amount= rand(100, 10000);

        return $request;
    }//getDummyExpanseRequest


}//class
