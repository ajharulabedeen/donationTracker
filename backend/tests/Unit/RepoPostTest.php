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
    public function testMother(){
        echo"\n >----------- Mother Tester :---------> \n";
        // $this->countAllPost();
        // $this->countAllPost_specificUser();
        // $this->findOne(5);
    }//mother test

    public function findOne($id){
        // $postRepo = new Post_Repo_Impl;
        $postRepo = $this->getRepoPostImpl();
        $prof = $postRepo->findOne($id);
        $this->assertTrue($prof!=null);
        echo($prof);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function countAllPost(){
        // $postRepo = new Post_Repo_Impl;
        $postRepo = $this->getRepoPostImpl();
        $total = $postRepo->countAll();
        echo("\n Total Posts: " . $total);
    }
    public function countAllPost_specificUser(){
        $postRepo = new Post_Repo_Impl;
        // $postRepo = $this->getRepoPostImpl();
        //a dummy user id has been given.
        $total = $postRepo->countAll_specificUser();
        echo("\n Total Posts, a User: " . $total);
    }
    public function getRepoPostImpl(){
        return new Post_Repo_Impl;
    }
}//class
