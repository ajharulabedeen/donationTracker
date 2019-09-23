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

    public function update(Post $postUpdate)
    {
        $raedOld = false;
        $updateStatus = false;
        try {
            $psot_id = $postUpdate->id;
            $postOrgin = Post::find($psot_id);
            $raedOld = true;
        } catch (Exception $e) {
            error_log("Post Update : failed to read existig post.");
        }
        if ($raedOld) {
            try {
                $this->setPostValues($postOrgin, $postUpdate)->update();
                $updateStatus = true;
            } catch (Exception $e) {
                error_log("Post Update : Failed to save updated post." . "\n\n" . $e);
            }
        }
        return  $updateStatus;
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
    //refactor
    private function setPostValues(Post $postOrgin, Post $postUpdate)
    {
        try {
            if ($postUpdate->user_id != null)
                $postOrgin->user_id = $postUpdate->user_id;
            if ($postUpdate->title != null)
                $postOrgin->title = $postUpdate->title;
            if ($postUpdate->description != null)
                $postOrgin->description = $postUpdate->description;
            if ($postUpdate->total_needed != null)
                $postOrgin->total_needed = $postUpdate->total_needed;
            if ($postUpdate->total_collected != null)
                $postOrgin->total_collected = $postUpdate->total_collected;
            if ($postUpdate->total_expanse != null)
                $postOrgin->total_expanse = $postUpdate->total_expanse;
            if ($postUpdate->start_date != null)
                $postOrgin->start_date = $postUpdate->start_date;
            if ($postUpdate->end_date != null)
                $postOrgin->end_date = $postUpdate->end_date;
            if ($postUpdate->active != null)
                $postOrgin->active = $postUpdate->active;
            if ($postUpdate->updated_at != null)
                $postOrgin->updated_at = $postUpdate->updated_at;
            if ($postUpdate->created_at != null)
                $postOrgin->created_at = $postUpdate->created_at;
        } catch (Exception $e) {
            error_log("\n\nProblem IN Data Setting...!\n\n");
        }
        return $postOrgin;
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
