<?php

namespace Tests\Unit;

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
        echo "\n >----------- Test Name : " . get_class($this);
        echo "\n >----------- Test Main : ---------> \n";
        // $this->countAllPost();
        // $this->countAllPost_specificUser();
        // $this->findOne(54);
        $this->postDelete(54);
    } //mother test

    //not completed
    public function poetSave()
    {
        $postDummy =  [
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

        $postRepo = $this->getRepoPostImpl();
        // $post = $postRepo->

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
        return new Post_Repo_Impl;
    }
}//class
