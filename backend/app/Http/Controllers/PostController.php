<?php

namespace App\Http\Controllers;

use App\models\Post;
use App\repository\Post_Repo_I;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post_repo;

    public function __construct(Post_Repo_I $post_repo)
    {
        $this->post_repo = $post_repo;
    }

    public function savePost(Request $request)
    {
        $post = $this->setPostValues($request, new Post());
        $id = $this->post_repo->save($post);
        return $id;
    } //savePost

    public function updatePost(Request $request)
    {
        $postUpdate = $this->setPostValues($request, new Post());
        if ($request->id == null)
            return response("No ID. Pls send data with ID.", 510);
        else
            return $this->post_repo->update($postUpdate);
    } //updatePost

    public function deletePost($id)
    {
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

    private function setPostValues(Request $r, Post $p)
    {
        try {
            if ($r->id != null)
                $p->id = $r->id;
            if ($r->user_id != null)
                $p->user_id = $r->user_id;
            if ($r->title != null)
                $p->title = $r->title;
            if ($r->description != null)
                $p->description = $r->description;
            if ($r->total_needed != null)
                $p->total_needed = $r->total_needed;
            if ($r->total_collected != null)
                $p->total_collected = $r->total_collected;
            if ($r->total_expanse != null)
                $p->total_expanse = $r->total_expanse;
            if ($r->start_date != null)
                $p->start_date = $r->start_date;
            if ($r->end_date != null)
                $p->end_date = $r->end_date;
            if ($r->active != null)
                $p->active = $r->active;
            if ($r->updated_at != null)
                $p->updated_at = $r->updated_at;
            if ($r->created_at != null)
                $p->created_at = $r->created_at;
        } catch (Exception $e) {
            error_log("\n\nProblem IN Data Setting...!\n\n");
        }
        return $p;
    } //setPostValues



}//class
