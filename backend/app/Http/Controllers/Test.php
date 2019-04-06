<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Post;
use App\repository\Post_Repo_I;
use App\repository\Post_Repo_Impl;


class Test extends Controller
{
    protected $post_repo;
    public function __construct(Post_Repo_I $post_repo)
    {
        $this->post_repo = $post_repo;
    }
    
    public function t(Request $r)
    {
        
    }//t

    public function update(Request $request)
    {

        // $pst = Post::find(19);
        // if($r->title!=null)
        //     $pst->title = $r->title;
        // $pst->save();

        // $post_repo = new Post_post_repompl(); 
        error_log("");
        $post = $this->post_repo->update($request);//for DI
        // $post = $post_repo->update($request);

        // $psot_id = $request->id;
        // $post=Post::find($psot_id);
        // $this->setPostValues($request,$post);

        return $post;
    }//update

    public function getAll(Request $request)
    {
        return $this->post_repo->getAll($request);
    }

}//class
