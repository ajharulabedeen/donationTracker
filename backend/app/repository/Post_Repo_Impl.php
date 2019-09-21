<?php

namespace App\repository;

use App\repository\Post_DB_I;
use Illuminate\Http\Request;
use App\models\Post;
use App\Utils\Util;
use Exception;

class Post_Repo_Impl implements Post_Repo_I
{

    public function save(Request $request)
    {
        $p = new Post;
        $this->setPostValues($request, $p)->save();
        return $p;
    } //save

    public function findOne($id)
    {
        return Post::find($id);
    } //findOne

    public function delete($id)
    {
        // exception not working, instead of fail message showing error in the post man.
        // try{
        //     error_log("1");
        //     Post::find($id)->delete();
        //     error_log("2");
        //     $status = "delete success";
        // }catch(Exception $e){
        //     $status = "delete fail";
        // }

        $post = Post::find($id);
        dd($post); //tst
        error_log("Post ID Given : " . $id); //tst
        error_log("Post ID : " . $post->id); //tst
        if ($post != null) {
            try {
                $post->delete();
                $status = "delete success";
                error_log("Delete Done...!"); //tst
                dd($post); //tst

            } catch (Exception $e) {
                error_log($e);
            }
        } else {
            $status = "delete fail";
        }
        return $status;
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
    private function setPostValues(Request $r, Post $p)
    {
        try {
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

    public function countAll()
    {
        return Post::all()->count();
    }

    public function countAll_specificUser()
    {
        $userID = Util::getCurrentUserName();
        return Post::where("user_id", $userID)->count();
    }
}//impl class
