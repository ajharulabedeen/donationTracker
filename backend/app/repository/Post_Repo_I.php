<?php
namespace App\repository;

use App\models\Post;
use Illuminate\Http\Request;

interface Post_Repo_I {
    // public function save(Request $request);//not is use
    // public function update(Request $request);//not is use
    public function save(Post $post);
    public function update(Post $postUpdate);
    public function delete($id);
    public function findOne($id);
    public function getAll(Request $request);
    public function countAll();
    public function countAll_specificUser();
}//interface