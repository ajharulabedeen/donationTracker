<?php

namespace App\Http\Controllers;
use App\models\Post;
use App\repository\Post_Repo_I;
use App\repository\Post_Repo_Impl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    protected $post_repo;
    
    public function __construct(Post_Repo_I $post_repo)
    {
        $this->post_repo = $post_repo;
    }
    
    public function savePost(Request $request)
    {
        return $this->post_repo->save($request);
    }//savePost
    
    public function updatePost(Request $request)
    {
        if($request->id == null)
            return response ("No ID. Pls send data with ID.", 510);
        else    
            return $this->post_repo->update($request);
    }//updatePost

    public function deletePost($id){
        return $this->post_repo->delete($id);
    }

    public function getAll(Request $request)
    {
        return $this->post_repo->getAll($request);
    }

    public function findOne($id)
    {
        return $this->post_repo->findOne($id);
    }
    
}//class
