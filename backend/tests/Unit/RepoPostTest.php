<?php

namespace Tests\Unit;

use App\models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\repository\Post_Repo_Impl;

class RepoPost extends TestCase
{


    /**
     * Mother test
     * This method will w$ork as mother test method.
     * all other test method will be called from here. 
     * So test skip can be easily achived.
     * 
     */
    public function testMain()
    {
        echo "\n >----------- Test Main : ---------> \n";
        // $this->countAllPost();
        // $this->countAllPost_specificUser();
        // $this->postDelete(54);
        // $this->postSave();
        // $this->postUpdate();
        $this->findOne(2);
        // $this->readOne();//working
    } //mother test

    public function readOne(){
        $postDummyUpdate = Post::find(2);
        // $postDummyUpdate = new Post();
        // $postDummyUpdate->id = '1';
        $postDummyUpdate->user_id = 'Tst';
        $postDummyUpdate->title = '........';
        $postDummyUpdate->description = 'UnitTesting of URLs';
        $postDummyUpdate->total_needed = '2000';
        $postDummyUpdate->total_collected = '1000';
        $postDummyUpdate->total_expanse = '500';
        $postDummyUpdate->start_date = '22-09-2019';
        $postDummyUpdate->end_date = '22-10-2019';
        $postDummyUpdate->active = '1';
        // $postDummyUpdate->updated_at = '2019-09-24';
        // $postDummyUpdate->created_at = '2019-09-22';
        $postDummyUpdate->save();

    }

    public function postUpdate()
    {
        $postDummyUpdate = new Post();
        $postDummyUpdate->id = '2';
        // $postDummyUpdate->user_id = 'Tst';
        // $postDummyUpdate->title = '++++........';
        $postDummyUpdate->description = '********Description UnitTesting of URLs';
        // $postDummyUpdate->total_needed = '2000';
        // $postDummyUpdate->total_collected = '1000';
        // $postDummyUpdate->total_expanse = '500';
        // $postDummyUpdate->start_date = '22-09-2019';
        // $postDummyUpdate->end_date = '22-10-2019';
        // $postDummyUpdate->active = '1';
        // $postDummyUpdate->updated_at = '2019-09-24';
        // $postDummyUpdate->created_at = '2019-09-22';

        echo '\n----PostUpdate----\n';
        $postRepoSave = $this->getRepoPostImpl();
        // dd($postRepoSave->update($postDummyUpdate));
        $updateStatus = $postRepoSave->update($postDummyUpdate);
        if ($updateStatus == false) {
            error_log("\n\nTest : Data Save Failed.");
        } else {
            error_log("Saved Post ID : " . $postDummyUpdate->id);
        }
        dd($updateStatus);
    }


    //not completed
    public function postSave()
    {
        $postDummy = new Post();
        // $postDummy->id ='';
        {
            $postDummy->user_id = 'Tst';
            $postDummy->title = 'Post Save Repo Test.';
            $postDummy->description = 'UnitTesting of URLs';
            $postDummy->total_needed = '2000';
            $postDummy->total_collected = '1000';
            $postDummy->total_expanse = '500';
            $postDummy->start_date = '22-09-2019';
            $postDummy->end_date = '22-10-2019';
            $postDummy->active = '1';
            $postDummy->updated_at = '2019-09-22';
            $postDummy->created_at = '2019-09-22';
        }

        // $postDummy->updated_at = '22-09-2019';// not working.
        // $postDummy->created_at = '22-09-2019';// not working.        

        echo '\n----PostSave----\n';
        $postRepoSave = $this->getRepoPostImpl();
        dd($postRepoSave->save($postDummy));
        if ($postRepoSave == -1) {
            error_log("\n\nTest : Data Save Failed.");
        } else {
            error_log("Saved Post ID : " . $postRepoSave);
        }


        //working, printing 10 lines.  but not saving 10 entry.
        // for ($x = 0; $x <= 10; $x++) {
        // echo '\n----PostSave Loop:----\n' . $x;
        //     echo "\nThe number is:" .  $x;
        // }
    }

    public function findOne($id)
    {
        // $postRepo = new Post_Repo_Impl;
        $postRepo = $this->getRepoPostImpl();
        $prof = $postRepo->findOne($id);
        $this->assertTrue($prof != null);
        echo ($prof);
    }

    public function postDelete($id)
    {
        $postRepo = $this->getRepoPostImpl();
        $status = $postRepo->delete($id);
        // dd($total);
        error_log("\nPost Delete : \n");

        if ($status) {
            echo "Delete Success : " . $id;
        } else {
            echo "Delete Fail : " . $id;
        }
    }

    public function countAllPost()
    {
        // $postRepo = new Post_Repo_Impl;
        $postRepo = $this->getRepoPostImpl();
        $total = $postRepo->countAll();
        echo ("\n Total Posts: " . $total);
    }

    public function countAllPost_specificUser()
    {
        $postRepo = new Post_Repo_Impl;
        // $postRepo = $this->getRepoPostImpl();
        //a dummy user id has been given.
        $total = $postRepo->countAll_specificUser();
        echo ("\n Total Posts, a User: " . $total);
    }

    public function getRepoPostImpl()
    {
        return new Post_Repo_Impl();
    }
}//class
