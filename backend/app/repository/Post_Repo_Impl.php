<?php

namespace App\repository;

use App\repository\Post_DB_I;
use Illuminate\Http\Request;
use App\models\Post;
use App\Utils\Util;
use Exception;

class Post_Repo_Impl implements Post_Repo_I
{

    public function save(Post $post)
    {
        $id = -1;
        try {
            $post->save();
            $id = $post->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Post Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }

    public function findOne($id)
    {
        return Post::find($id);
    } //findOne

    public function delete($id)
    {
        $status = true;
        try {
            $post = Post::select('id')->where('id', $id)->get()[0]->id;
            $status = Post::where('id', $id)->delete();
        } catch (Exception $e) {
            $status = false;
        }
        return $status;
        // return true;
    } //delete

    public function update(Request $request)
    {
        $psot_id = $request->id;
        $post = Post::find($psot_id);
        $this->setPostValues($request, $post)->save();
        return  $post;
    } //update


    public function getAll(Request $request)
    {
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $userID = Util::getCurrentUserName();
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return Post::where("user_id", $userID)->orderBy('created_at', $order)->paginate($per_page);
    } //getAll    

    //-------------------------
    // private function setPostValues(Request $r, Post $p)
    // {
    //     try {
    //         if ($r->user_id != null)
    //             $p->user_id = $r->user_id;
    //         if ($r->title != null)
    //             $p->title = $r->title;
    //         if ($r->description != null)
    //             $p->description = $r->description;
    //         if ($r->total_needed != null)
    //             $p->total_needed = $r->total_needed;
    //         if ($r->total_collected != null)
    //             $p->total_collected = $r->total_collected;
    //         if ($r->total_expanse != null)
    //             $p->total_expanse = $r->total_expanse;
    //         if ($r->start_date != null)
    //             $p->start_date = $r->start_date;
    //         if ($r->end_date != null)
    //             $p->end_date = $r->end_date;
    //         if ($r->active != null)
    //             $p->active = $r->active;
    //         if ($r->updated_at != null)
    //             $p->updated_at = $r->updated_at;
    //         if ($r->created_at != null)
    //             $p->created_at = $r->created_at;
    //     } catch (Exception $e) {
    //         error_log("\n\nProblem IN Data Setting...!\n\n");
    //     }

    //     return $p;
    // } //setPostValues

    public function countAll()
    {
        return Post::all()->count();
    }

    public function countAll_specificUser()
    {
        $userID = Util::getCurrentUserName();
        return Post::where("user_id", $userID)->count();
    }

    // ------------------------- OLD CODE-----------------------------
    //the code replaced by model.

    // public function save(Request $r)
    // {
    //     $p = new Post();
    //     try {
    //         error_log("Saveing -----------");

    //         $this->setPostValues($r, $p)->save();
    //     } catch (Exception $e) {
    //         // $saveStatus=false;
    //         error_log("Saveing Post Failed. : ");
    //     }
    //     return $p;
    // } //save

}//impl class
